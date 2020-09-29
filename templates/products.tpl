{include file="addons/header.tpl"}
Products
{if !is_array($products)}
{$products = []}
{/if}

{include file="addons/products.tpl"}


{include file="addons/footer.tpl"}