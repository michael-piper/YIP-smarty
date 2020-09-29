{include file="addons/header.tpl"}
Cart
{if !is_array($cart)}
{$cart = []}
{/if}
<ul>
{foreach from=$cart item=$cartItem}
<li> 
<div>
<a href="/product/{$cartItem.product.sku}">{$cartItem.product.name}</a>
<h6>Qty: {$cartItem.quantity}</h6>
</div>
</li>
{/foreach}
</ul>

{include file="addons/footer.tpl"}