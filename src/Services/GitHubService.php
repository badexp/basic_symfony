<?php


namespace App\Services;


class GitHubService
{
    private const BASE_URL = 'https://api.github.com';

    private const RESOURCE_PUBLIC_GISTS = '/gists/public';

    public function getPublicGists(): string
    {
        $opts = [
            "http" => [
                "method" => "GET",
                "header" => "User-Agent: request\r\n"
            ]
        ];

        $context = stream_context_create($opts);

        $data = file_get_contents(self::BASE_URL.self::RESOURCE_PUBLIC_GISTS, false, $context);
        return $data;
    }
}