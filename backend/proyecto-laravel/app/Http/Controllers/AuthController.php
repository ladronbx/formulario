<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $validator = $this->validateRegister($request);

            if ($validator->fails()) {
                return response()->json(
                    [
                        "success" => false,
                        "message" => "Error registering user",
                        "error" => $validator->errors()
                    ],
                    Response::HTTP_BAD_REQUEST
                );
            }

            // Deducción de la provincia con los 2 primero números del CP
            // $province = $this->getProvince(substr($request->input('postal_code'), 0, 2));

            // Comprobación de si un usuario con el mismo email se ha registrado en las últimas 24 horas
            // if (!$this->check24h($request->input('email'))) {
            //     return response()->json(
            //         [
            //             "success" => false,
            //             "message" => "User with the same email already registered within the last 24 hours"
            //         ],
            //         Response::HTTP_BAD_REQUEST
            //     );
            // }

            // Crear un nuevo usuario en la base de datos
            // $this->insertLead($request->all());

            $newUser = User::create([
                "name" => $request->input('name'),
                "last_name" => $request->input('last_name'),
                "email" => $request->input('email'),
                "phone" => $request->input('phone'),
                "postal_code" => $request->input('postal_code'),
                // "province" => $province,
                "privacy_policy_accepted" => $request->input('privacy_policy_accepted') === 'true' ? true : false,
            ]);

            return response()->json(
                [
                    "success" => true,
                    "message" => "User registered",
                    "data" => $newUser
                ],
                Response::HTTP_CREATED
            );
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            return response()->json(
                [
                    "success" => false,
                    "message" => "Error registering user"
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    private function validateRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|alpha|max:20',
            'last_name' => 'required|alpha|max:20',
            'email' => 'required|email',
            'phone' => 'required|digits:9|numeric',
            'postal_code' => 'required|digits:5|numeric',
            'privacy_policy_accepted' => 'required|accepted',
        ]);

        $validator->after(function ($validator) use ($request) {
            $this->validateAttack($validator, $request);
        });

        return $validator;
    }

    // Aquí se definirían las funciones auxiliares proporcionadas por el ejercicio las cuales se indica que no se desarolle la lógica:
    // private function getProvince($postal_code)
    // {
    // }
    // private function check24h($email)
    // {
    // }
    // private function insertLead(array $userData)
    // {
    // }

    private function validateAttack($validator, $request)
    {
        $checkFields = ['name', 'last_name', 'email', 'phone', 'postal_code'];
        foreach ($checkFields as $field) {
            $value = $request->input($field);
            if ($value != strip_tags($value)) {
                $validator->errors()->add($field, 'Input contains potentially dangerous characters');
            }
        }
    }
}