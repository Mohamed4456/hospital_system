<?php


namespace App\Interfaces\Finance;


interface PaymentRepositoryInterface
{
    // get All Receipt
    public function index();

    // show form add
    public function create();

    // show form add
    public function show($request);

    // store Receipt
    public function store($request);

    // edit Receipt
    public function edit($id);

    // Update Receipt
    public function update($request);

    // destroy Receipt
    public function destroy($request);
}