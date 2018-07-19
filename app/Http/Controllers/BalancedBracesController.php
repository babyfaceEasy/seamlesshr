<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BalancedBracesController extends Controller
{
    //this controller has just one method.
    /*
    Algo: we make use of stacks data structure,
    Here we go through each element inside the string if its an open brace like [, { or ( we push it on to the stack.
    If its a ], }, ) we check two things if the stack is empty then "NO"
    If we pop the stack and it doesn't match the closing brace we return "NO"
    We continue until the stack is empty then we return "TRUE" else we return "NO"  
    */

    public function __invoke(){
        $expressions = [
            '(A+B)+(C-D)', '((A+B)+(C+D)', '((A+B)+[C-D])', '((A+B)+[C-D]}', 'A*B-(C-D)+E'
        ];

        $results_arr = [];

        foreach($expressions as $expression){
            $expression_arr = str_split($expression);
            $stack_arr = [];
            $status = true;
            foreach($expression_arr as $char){

                if ($char === '(' || $char === '{' || $char === '['){
                    //insert into stack ds
                    array_push($stack_arr, $char);
                }else if ($char === ')' || $char === '}' || $char === ']'){
                    //check the two conditions
                    if( count($stack_arr) == 0){
                        $status=false;
                        break;
                    }
                    $stack_top = array_pop($stack_arr);

                    if($char === ')' && $stack_top !== '('){
                        $status=false;
                        break;
                    }elseif($char === '}' && $stack_top !== '{'){
                        $status=false;
                        break;
                    }elseif($char === ']' && $stack_top !== '['){
                        $status=false;
                        break;
                    }
                }
            }//foreach($expression_arr as $char)
            if ($status && count($stack_arr) == 0)
                $results_arr[] = "YES";
            else {
                $results_arr[] = "NO";
            }
        }
        //dump($results_arr);
        return $results_arr;
    }//end of __invoke()
}
