<?php

//弹出信息提示框
function alert($message, $type='success'){
    session()->flash($type, $message);
}
