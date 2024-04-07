<?php

class ListNode
{
    /* Node constructor */
    public function __construct(
        public $data,
        public $next = NULL,
    )
    {
    }

    function readNode()
    {
        return $this->data;
    }
}


class LinkList
{
    /* List constructor */
    public function __construct(
        public mixed $firstNode = NULL,
        public mixed $lastNode = NULL,
        public int   $count = 0,
    )
    {
    }

    public function isEmpty(): bool
    {
        return ($this->firstNode == NULL);
    }

    public function insertFirst($data): void
    {
        $link = new ListNode($data);
        $link->next = $this->firstNode;
        $this->firstNode = &$link;

        /* If this is the first node inserted in the list
           then set the lastNode pointer to it.
        */
        if ($this->lastNode == NULL) {
            $this->lastNode = &$link;
        }

        $this->count++;
    }

    public function insertLast($data): void
    {
        if ($this->firstNode != NULL) {
            $link = new ListNode($data);
            $this->lastNode->next = $link;
            $link->next = NULL;
            $this->lastNode = &$link;
            $this->count++;
        } else {
            $this->insertFirst($data);
        }
    }

    public function deleteFirstNode()
    {
        $temp = $this->firstNode;
        $this->firstNode = $this->firstNode->next;

        if ($this->firstNode != NULL) {
            $this->count--;
        }

        return $temp;
    }

    public function deleteLastNode(): void
    {
        if ($this->firstNode != NULL) {
            if ($this->firstNode->next == NULL) {
                $this->firstNode = NULL;
            } else {
                $previousNode = $this->firstNode;
                $currentNode = $this->firstNode->next;

                while ($currentNode->next != NULL) {
                    $previousNode = $currentNode;
                    $currentNode = $currentNode->next;
                }

                $previousNode->next = NULL;
            }
            $this->count--;
        }
    }

    public function deleteNode($key)
    {
        $current = $this->firstNode;
        $previous = $this->firstNode;

        while ($current->data != $key) {
            if ($current->next == NULL) {
                return NULL;
            } else {
                $previous = $current;
                $current = $current->next;
            }
        }

        if ($current == $this->firstNode) {
            if ($this->count == 1) {
                $this->lastNode = $this->firstNode;
            }
            $this->firstNode = $this->firstNode->next;
        } else {
            if ($this->lastNode == $current) {
                $this->lastNode = $previous;
            }
            $previous->next = $current->next;
        }
        $this->count--;
    }

    public function find($key)
    {
        $current = $this->firstNode;

        while ($current->data != $key) {
            if ($current->next == NULL) {
                return null;
            } else {
                $current = $current->next;
            }
        }
        return $current;
    }

    public function readNode($nodePos)
    {
        if ($nodePos <= $this->count) {
            $current = $this->firstNode;
            $pos = 1;

            while ($pos != $nodePos) {
                if ($current->next == NULL) {
                    return null;
                } else {
                    $current = $current->next;
                }

                $pos++;
            }
            return $current->data;
        } else {
            return NULL;
        }
    }

    public function totalNodes(): int
    {
        return $this->count;
    }

    public function printList(): array
    {
        $listData = array();
        $current = $this->firstNode;

        while ($current != NULL) {
            $listData[] = $current->readNode();
            $current = $current->next;
        }

        return $listData;
    }

    public function reverseList(): void
    {
        if ($this->firstNode != NULL) {
            if ($this->firstNode->next != NULL) {
                $current = $this->firstNode;
                $new = NULL;

                while ($current != NULL) {
                    $temp = $current->next;
                    $current->next = $new;
                    $new = $current;
                    $current = $temp;
                }
                $this->firstNode = $new;
            }
        }
    }
}

$theList = new LinkList();
$theList->insertLast(4);
$theList->insertLast(8);
$theList->insertLast("13");
$theList->insertLast("hello");
$theList->insertLast(8.2);
print_r($theList->printList()); // [4, 8, 13, hello, 8.2]
