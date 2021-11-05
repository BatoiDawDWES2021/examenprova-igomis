<?php
use App\QueryBuilder;
use App\Connection;

return new QueryBuilder(Connection::make());
