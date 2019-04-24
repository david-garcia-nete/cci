<?php

class MatrixRotator {

    public static function rotate(array &$matrix) {

        if (count($matrix) == 0 || count($matrix) != count($matrix[0])) return false; // Not a square

                    $n = count($matrix);

                    for ($layer = 0; $layer < $n / 2; $layer++) {

                            $first = $layer;

                            $last = $n - 1 - $layer;

                            for($i = $first; $i < $last; $i++) {

                                    $offset = $i - $first;

                                    $top = $matrix[$first][$i]; // save top



                                    // left -> top

                                    $matrix[$first][$i] = $matrix[$last-$offset][$first]; 			



                                    // bottom -> left

                                    $matrix[$last-$offset][$first] = $matrix[$last][$last - $offset]; 



                                    // right -> bottom

                                    $matrix[$last][$last - $offset] = $matrix[$i][$last]; 



                                    // top -> right

                                    $matrix[$i][$last] = $top; // right <- saved top

                            }

                    }

                    return true;

    }

}


