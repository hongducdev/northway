(function ($) {
    "use strict";

    var charts = {};

    function initChart($canvas) {
        var id = $canvas.attr("id");
        if (!id) return;
        var cfgRaw = $canvas.attr("data-chart-config");
        if (!cfgRaw) return;
        try {
            var cfg = JSON.parse(cfgRaw);
            // Auto-merge case: user provided one value per month as separate datasets
            if (
                cfg &&
                cfg.data &&
                Array.isArray(cfg.data.labels) &&
                Array.isArray(cfg.data.datasets) &&
                cfg.data.datasets.length > 1 &&
                cfg.data.datasets.every(function (ds) {
                    return Array.isArray(ds.data) && ds.data.length === 1;
                })
            ) {
                var merged = {
                    label:
                        (cfg.data.datasets[0] && cfg.data.datasets[0].label) ||
                        "Series",
                    data: [],
                    borderColor:
                        (cfg.data.datasets[0] &&
                            cfg.data.datasets[0].borderColor) ||
                        "#1e3a8a",
                    backgroundColor:
                        (cfg.data.datasets[0] &&
                            cfg.data.datasets[0].backgroundColor) ||
                        "rgba(30,58,138,0.2)",
                    borderWidth:
                        (cfg.data.datasets[0] &&
                            cfg.data.datasets[0].borderWidth) ||
                        2,
                    pointBackgroundColor:
                        (cfg.data.datasets[0] &&
                            cfg.data.datasets[0].pointBackgroundColor) ||
                        "#ffffff",
                    pointBorderColor:
                        (cfg.data.datasets[0] &&
                            cfg.data.datasets[0].pointBorderColor) ||
                        "#1e3a8a",
                    pointBorderWidth:
                        (cfg.data.datasets[0] &&
                            cfg.data.datasets[0].pointBorderWidth) ||
                        2,
                    pointRadius:
                        (cfg.data.datasets[0] &&
                            cfg.data.datasets[0].pointRadius) ||
                        4,
                    pointHoverRadius:
                        (cfg.data.datasets[0] &&
                            cfg.data.datasets[0].pointHoverRadius) ||
                        6,
                    fill: !!(cfg.data.datasets[0] && cfg.data.datasets[0].fill),
                    tension:
                        (cfg.data.datasets[0] &&
                            cfg.data.datasets[0].tension) ||
                        0.3,
                };
                for (var i = 0; i < cfg.data.labels.length; i++) {
                    var dsAtIndex = cfg.data.datasets[i];
                    merged.data.push(
                        dsAtIndex && Array.isArray(dsAtIndex.data)
                            ? dsAtIndex.data[0] || null
                            : null
                    );
                }
                cfg.data.datasets = [merged];
            }
            if (charts[id] && charts[id].destroy) charts[id].destroy();
            var ctx = $canvas.get(0).getContext("2d");
            charts[id] = new Chart(ctx, cfg);
        } catch (e) {
            // fail silently
        }
    }

    var WidgetChartJsHandler = function ($scope) {
        $scope.find("canvas[data-chart-config]").each(function () {
            initChart($(this));
        });
    };

    $(window).on("elementor/frontend/init", function () {
        if (window.elementor && elementorFrontend && elementorFrontend.hooks) {
            elementorFrontend.hooks.addAction(
                "frontend/element_ready/pxl_chart.default",
                WidgetChartJsHandler
            );
        }
        // Fallback for non-Elementor loads
        $("canvas[data-chart-config]").each(function () {
            initChart($(this));
        });
    });
})(jQuery);
