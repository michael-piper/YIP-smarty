{include file="addons/header.tpl"}
Sugested Products
{if !is_array($products)}
{$products = []}
{/if}

{include file="addons/products.tpl"}

{include file="addons/footer.tpl"}