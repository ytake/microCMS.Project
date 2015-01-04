<?php
/**
 * local development
 * xhprof setting
 */
if(extension_loaded('xhprof')) {
    // enable xhprof
    /** @var \Illuminate\Foundation\Application $app */
    $app->booted(function () {
        xhprof_enable(XHPROF_FLAGS_CPU | XHPROF_FLAGS_MEMORY);
    });

    $app->events->listen('creating:*', function($view) {
        $projectName = "Application.BasicPack";
        $profilerData = xhprof_disable();
        $profiler = new \XHProfRuns_Default();
        $runId = $profiler->save_run($profilerData, $projectName);
        $public = url();
        $content = "
            <div class=\"label label-danger\" style=\"position: absolute; bottom: 10px; right: 10px;\">
                <a href=\"{$public}/xhprof_html/index.php?run={$runId}&source={$projectName}\" target=\"_blank\" style=\"color: #ffffff; text-decoration: none;\">Profiler</a>
            </div>
            ";
        $view->getFactory()->inject('debug.profiler', $content);
    });
}
