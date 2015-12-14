<?php

namespace Actions;

/**
 * Class Error404Action
 *
 */
class Error404Action extends AbstractAction
{
    /**
     * @return string
     */
    public function render()
    {
        return "Page not found!";
    }
}
