<?php

namespace Laravel\Vapor;

/**
 * Provides access to AWS Lambda execution context metadata.
 *
 * This trait exposes commonly used AWS Lambda environment variables such as
 * request ID, function name, version, and log stream details. These values
 * are useful for logging, tracing, and observability within Laravel Vapor
 * applications running on AWS Lambda.
 */
trait HasLambdaContext
{
    /**
     * Get the AWS Lambda request ID for the current invocation.
     *
     * @return string|null
     */
    public static function getRequestId(): ?string
    {
        return $_ENV['AWS_REQUEST_ID'] ?? null;
    }

    /**
     * Get the name of the AWS Lambda function.
     *
     * @return string|null
     */
    public static function getFunctionName(): ?string
    {
        return $_ENV['AWS_LAMBDA_FUNCTION_NAME'] ?? null;
    }

    /**
     * Get the version of the AWS Lambda function.
     *
     * @return string|null
     */
    public static function getFunctionVersion(): ?string
    {
        return $_ENV['AWS_LAMBDA_FUNCTION_VERSION'] ?? null;
    }

    /**
     * Get the AWS Lambda log group name.
     *
     * @return string|null
     */
    public static function getGroupName(): ?string
    {
        return $_ENV['AWS_LAMBDA_GROUP_NAME'] ?? null;
    }

    /**
     * Get the AWS Lambda log stream name.
     *
     * @return string|null
     */
    public static function getLogStreamName(): ?string
    {
        return $_ENV['AWS_LAMBDA_LOG_STREAM_NAME'] ?? null;
    }

    /**
     * Get the AWS Lambda execution context as an associative array.
     *
     * @return array{
     *     request_id: string|null,
     *     function_name: string|null,
     *     function_version: string|null,
     *     group_name: string|null,
     *     log_stream_name: string|null
     * }
     */
    public function getContextArray(): array
    {
        return [
            'request_id' => self::getRequestId(),
            'function_name' => self::getFunctionName(),
            'function_version' => self::getFunctionVersion(),
            'group_name' => self::getGroupName(),
            'log_stream_name' => self::getLogStreamName(),
        ];
    }
}
