<?php

foreach (glob(__DIR__."/services/*.php") as $filename)
{
    include $filename;
}
