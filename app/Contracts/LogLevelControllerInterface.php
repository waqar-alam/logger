<?php

namespace App\Contracts;

interface LogLevelControllerInterface
{
    public function show(string $name);
    public function index();
    public function store(LogLevelRequest $request);
    public function update(LogLevelRequest $request, string $name);
    public function destroy(string $name);
}
