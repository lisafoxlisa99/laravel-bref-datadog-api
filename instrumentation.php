<?php
// instrumentation.php
if (extension_loaded('ddtrace')) {
    \DDTrace\trace_method(
        'Bref\Runtime\Invoker',
        'invoke',
        function (\DDTrace\SpanData $span, $args) {
            $span->service = getenv('DD_SERVICE') ?: 'laravel-worker';
            $span->type = \DDTrace\Type::CLI;
            $span->name = 'lambda.invoke';

            if (isset($args) && is_object($args)) {
                $span->resource = get_class($args);
            }

            \DDTrace\flush();
        }
    );
}
