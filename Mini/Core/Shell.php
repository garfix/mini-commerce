<?php

namespace Mini\Core;

/**
 * @author Patrick van Bergen
 */
abstract class Shell extends Service
{
    public abstract function renderWithChild(Block $child);
}