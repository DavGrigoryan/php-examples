<?php
/**
 * Tic-Tac-Toe Game
 *
 * A PHP script that allows two players to play a game of Tic-Tac-Toe.
 */

class TicTacToe
{
    private $board;
    private $currentPlayer;
    private $winner;
    private $isGameOver;

    public function __construct()
    {
        $this->board = [
            ['', '', ''],
            ['', '', ''],
            ['', '', ''],
        ];
        $this->currentPlayer = 'X';
        $this->winner = null;
        $this->isGameOver = false;
    }

    public function makeMove($row, $col)
    {
        if ($this->isGameOver || $this->board[$row][$col] !== '') {
            return false;
        }

        $this->board[$row][$col] = $this->currentPlayer;

        if ($this->checkWinner($row, $col)) {
            $this->winner = $this->currentPlayer;
            $this->isGameOver = true;
        } elseif ($this->isBoardFull()) {
            $this->isGameOver = true;
        } else {
            $this->switchPlayer();
        }

        return true;
    }

    public function getCurrentPlayer()
    {
        return $this->currentPlayer;
    }

    public function isGameOver()
    {
        return $this->isGameOver;
    }

    public function getWinner()
    {
        return $this->winner;
    }

    public function displayBoard()
    {
        foreach ($this->board as $row) {
            echo implode(' | ', $row) . "\n";
            echo "---------\n";
        }
    }

    private function checkWinner($row, $col)
    {
        // Check row
        if (
            $this->board[$row][0] === $this->currentPlayer &&
            $this->board[$row][1] === $this->currentPlayer &&
            $this->board[$row][2] === $this->currentPlayer
        ) {
            return true;
        }

        // Check column
        if (
            $this->board[0][$col] === $this->currentPlayer &&
            $this->board[1][$col] === $this->currentPlayer &&
            $this->board[2][$col] === $this->currentPlayer
        ) {
            return true;
        }

        // Check diagonal
        if (
            ($row === $col && $this->board[0][0] === $this->currentPlayer &&
                $this->board[1][1] === $this->currentPlayer &&
                $this->board[2][2] === $this->currentPlayer) ||
            ($row + $col === 2 && $this->board[0][2] === $this->currentPlayer &&
                $this->board[1][1] === $this->currentPlayer &&
                $this->board[2][0] === $this->currentPlayer)
        ) {
            return true;
        }

        return false;
    }

    private function switchPlayer()
    {
        $this->currentPlayer = $this->currentPlayer === 'X' ? 'O' : 'X';
    }

    private function isBoardFull()
    {
        foreach ($this->board as $row) {
            foreach ($row as $cell) {
                if ($cell === '') {
                    return false;
                }
            }
        }

        return true;
    }
}

// Example usage
$tictactoe = new TicTacToe();

while (!$tictactoe->isGameOver()) {
    echo "Current Player: {$tictactoe->getCurrentPlayer()}\n";
    $tictactoe->displayBoard();

    echo "Enter row (0-2): ";
    $row = intval(trim(fgets(STDIN)));

    echo "Enter column (0-2): ";
    $col = intval(trim(fgets(STDIN)));

    $result = $tictactoe->makeMove($row, $col);

    if (!$result) {
        echo "Invalid move. Try again.\n";
    }

    echo "\n";
}

$tictactoe->displayBoard();

if ($tictactoe->getWinner()) {
    echo "Player {$tictactoe->getWinner()} wins!\n";
} else {
    echo "It's a tie!\n";
}
