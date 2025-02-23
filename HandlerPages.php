<?php

use traits\Layout;

class HandlerPages
{
    use Layout;

    public function pageNotFound()
    {
        $this->getLayout('404');
    }
}