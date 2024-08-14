<?php
function bfs_shortest_path($graph, $start, $end) {
    $queue = array();  // Create an empty queue
    $visited = array_fill(0, count($graph), false);
    $previous = array_fill(0, count($graph), null);

    $visited[$start] = true;
    array_push($queue, $start);  // Add the start node to the queue

    while (!empty($queue)) {
        $current = array_shift($queue);  // Remove the first element from the queue

        if ($current === $end) {
            // We have found the end node, backtrack from the end node to the start node and return the path
            $path = array();
            while ($current !== null) {
                array_unshift($path, $current);
                $current = $previous[$current];
            }
            return $path;
        }

        // Visit all the neighbors of the current node
        foreach ($graph[$current] as $neighbor) {
            if (!$visited[$neighbor]) {
                $visited[$neighbor] = true;
                $previous[$neighbor] = $current;
                array_push($queue, $neighbor);
            }
        }
    }

    // If we reach here, there is no path from start to end
    return null;
}

$graph = array(
    0 => array(1, 2),      // Node 0 is connected to nodes 1 and 2
    1 => array(0, 3, 4),   // Node 1 is connected to nodes 0, 3, and 4
    2 => array(0, 4),      // Node 2 is connected to nodes 0 and 4
    3 => array(1),         // Node 3 is connected to node 1
    4 => array(1, 5),      // Node 4 is connected to nodes 1 and 5
    5 => array(2, 4)       // Node 5 is connected to nodes 2 and 4
);

$start = 0;  // Start node
$end = 5;    // End node

$path = bfs_shortest_path($graph, $start, $end);

if ($path === null) {
    echo "No path found from node $start to node $end.";
} else {
    echo "Shortest path from node $start to node $end: " . implode(" -> ", $path);
}