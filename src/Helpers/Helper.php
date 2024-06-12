<?php

function rzq_api_site_url($storeId = null)
{
    return 'http://127.0.0.1:8000/api/v1/request/store-' . ($storeId ? $storeId : my_store_id());
}

function my_store_id()
{
    return auth()->user()->id;
}
