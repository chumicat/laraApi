<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="LaraApi",
 *     description="LaraApi project API documents",
 *     @OA\Contact(
 *         email="russell57260620@gmail.com"
 *     )
 * )
 */

/**
 * @OA\SecurityScheme(
 *     type="oauth2",
 *     description="Use a global client_id / client_secret and your username / password combo to obtain a token",
 *     name="Password Based",
 *     in="header",
 *     scheme="https",
 *     securityScheme="Password Based",
 *     @OA\Flow(
 *         flow="password",
 *         authorizationUrl="/oauth/authorize",
 *         tokenUrl="/oauth/token",
 *         refreshUrl="/oauth/token/refresh",
 *         scopes={}
 *     )
 * )
 */

/**
 * @OA\Tag(
 *     name="Name",
 *     description="Api to access 'names' database",
 *     @OA\ExternalDocumentation(
 *         description="Lint to api",
 *         url="http://laravel.test/api/name"
 *     )
 * )
 *
 * @OA\Tag(
 *     name="Resume",
 *     description="Api to access 'resumes' database",
 *     @OA\ExternalDocumentation(
 *         description="Lint to api",
 *         url="http://laravel.test/api/resume"
 *     )
 * )
 * 
 * @OA\Tag(
 *     name="Tag",
 *     description="Api to access 'tags' database",
 *     @OA\ExternalDocumentation(
 *         description="Lint to api",
 *         url="http://laravel.test/api/tag"
 *     )
 * )
 * 
 * @OA\Tag(
 *     name="ResumeTag",
 *     description="Api to access 'resume_tag' database",
 *     @OA\ExternalDocumentation(
 *         description="Lint to api",
 *         url="http://laravel.test/api/resumetag"
 *     )
 * )
 * 
 * @OA\Tag(
 *     name="NTR",
 *     description="Site to access all database above",
 *     @OA\ExternalDocumentation(
 *         description="Lint to site",
 *         url="http://laravel.test/ntr"
 *     )
 * )
 * 
 * @OA\ExternalDocumentation(
 *     description="Project Github",
 *     url="https://github.com/chumicat/laraApi"
 * )
 */

/**
 * @OA\Get(
 *      path="/projects",
 *      operationId="getProjectsList",
 *      tags={"Projects"},
 *      summary="Get list of projects",
 *      description="Returns list of projects",
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *       @OA\Response(response=400, description="Bad request"),
 *       security={
 *           {"api_key_security_example": {}}
 *       }
 *     )
 *
 * Returns list of projects
 */

/**
 * @OA\Get(
 *      path="/projects/{id}",
 *      operationId="getProjectById",
 *      tags={"Projects"},
 *      summary="Get project information",
 *      description="Returns project data",
 *      @OA\Parameter(
 *          name="id",
 *          description="Project id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *      @OA\Response(response=400, description="Bad request"),
 *      @OA\Response(response=404, description="Resource Not Found"),
 *      security={
 *         {
 *             "oauth2_security_example": {"write:projects", "read:projects"}
 *         }
 *     },
 * )
 */

