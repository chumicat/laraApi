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


