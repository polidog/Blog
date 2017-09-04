<?php

declare(strict_types=1);

namespace Polidog\Blog\Application;

interface TransactionManager
{
    /**
     * Begin transaction.
     */
    public function begin();

    /**
     * Commit transaction.
     */
    public function commit();

    /**
     * Rollback transaction.
     */
    public function rollback();
}
