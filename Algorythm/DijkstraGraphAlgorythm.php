<?php
function dijkstra($graph, $start, $end)
{
    $dist = array_fill(0, count($graph), INF);
    $dist[$start] = 0;

    $visited = array_fill(0, count($graph), false);
    $previous = array_fill(0, count($graph), null);

    while (true) {
        $minDist = INF;
        $current = null;

        for ($i = 0; $i < count($graph); $i++) {
            if (!$visited[$i] && $dist[$i] < $minDist) {
                $minDist = $dist[$i];
                $current = $i;
            }
        }

        if ($current === null || $current === $end) {
            break;
        }

        $visited[$current] = true;

        foreach ($graph[$current] as $next => $weight) {
            $alt = $dist[$current] + $weight;
            if ($alt < $dist[$next]) {
                $dist[$next] = $alt;
                $previous[$next] = $current;
            }
        }
    }

    $path = array();
    $current = $end;
    while ($current !== null) {
        array_unshift($path, $current);
        $current = $previous[$current];
    }

    return $path;
}

$graph = array(
    array(0, 7, 9, INF, INF, 14),
    array(7, 0, 10, 15, INF, INF),
    array(9, 10, 0, 11, INF, 2),
    array(INF, 15, 11, 0, 6, INF),
    array(INF, INF, INF, 6, 0, 9),
    array(14, INF, 2, INF, 9, 0),
);

$start = 0;
$end = 4;

$path = dijkstra($graph, $start, $end);

echo implode(' -> ', $path); // Output: 0 -> 2 -> 5 -> 4