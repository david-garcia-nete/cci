<?php

class MatrixRotator {

    public static function rotate(array &$matrix) {

        if (count($matrix) == 0 || count($matrix) != count($matrix[0])) return false; // Not a square

                    $n = count($matrix);

                    for ($layer = 0; $layer < $n / 2; $layer++) {

                            $first = $layer;

                            $last = $n - 1 - $layer;

                            for($i = $first; $i < $last; $i++) {

                                    $offset = $i - $first; // index - layer = how far in we are 

                                    $top = $matrix[$first][$i]; // save top



                                    // left -> top

                                    $matrix[$first][$i] = $matrix[$last-$offset][$first]; // last -offset = we don't want to access previously visited cells			



                                    // bottom -> left

                                    $matrix[$last-$offset][$first] = $matrix[$last][$last - $offset]; 



                                    // right -> bottom

                                    $matrix[$last][$last - $offset] = $matrix[$i][$last]; // $matrix[$i][$last] we're using the inner loop to get the row on the right



                                    // top -> right

                                    $matrix[$i][$last] = $top; // right <- saved top

                            }

                    }

                    return true;

    }

}


