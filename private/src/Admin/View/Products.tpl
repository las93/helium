<h1>Products</h1>
<a href="{url alias='products_add'}"/>
	<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAA3NCSVQICAjb4U/gAAAACXBIWXMAAAbsAAAG7AEedTg1AAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAADlQTFRF////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAlx7TAAAABJ0Uk5TAAETJkRocH+Amamztcvm8/b4dwgg7gAAAGZJREFUGJVlzzsWgyAUBNALEiOggm//i02RVGHKOfMF29Hvux+bL9I+n6vW65l7gnRGy5BbnAl7vH5Sr9jZZoNSoM3N8WQYA/Lz1i8QAa7urpQRETEK9V6JxbKELrXLsHX6cu7v/gcH3AWzLpi+OgAAAABJRU5ErkJggga7b7b32f392efc87c0fb2a2fbb4c19d5"/>
	New product
</a>
<br/><br/>
<table>
{foreach from=$products item=$product}
	<tr>
	   <td style="padding:10px;">{$product->get_id()}</td>
	   <td>{$product->get_name()}</td>
       <td>
        {if count($product->get_product_image()) > 0}
            <img src="http://{$app.const.FRONT_OFFICE_HOST}/product/img/{$product->get_product_image()[0]->get_id()}/25/25.jpg"/>
        {/if}  &nbsp; &nbsp; &nbsp; &nbsp;
       </td>
	   <td><a href="#" onclick="if (confirm('Do you confirm that you want delete this product?')) window.location.href='{url alias='products'}?remove={$product->get_id()}';"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAA3NCSVQICAjb4U/gAAAACXBIWXMAAAbsAAAG7AEedTg1AAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAADxQTFRF////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKNcQVgAAABN0Uk5TAAETJmhwf4CJj5mps7XLz+b2+G5VGk4AAABkSURBVBhXZY83DoBAEAPnEpfj/v+vFCAktC4tRwBcbGu16Hhgwj6jlHF2MACmS7UAtko3QBD/SvESwO3Kh7od8ViYCdIEey7aAJLkLAkYjVUAskgGKEsTyqJCVa0apqerc/zv3xr8BdfEC4s3AAAAAElFTkSuQmCC3fc07dd3f01250e98972e2a85d91785c"/></a>
	       &nbsp;&nbsp;
	       <a href="{url alias='products_update'}?update={$product->get_id()}"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAA3NCSVQICAjb4U/gAAAACXBIWXMAAAbsAAAG7AEedTg1AAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAADNQTFRF////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA8YBMDAAAABB0Uk5TAAggOEBgeH2AuMDW4PD3+BmnWgwAAABgSURBVBhXbc85EoAwDENREZZ8dt3/tBSOAwXq9OzxjKVP6l6k1bbta5TweRR5A2AZhCnnLtP2McK1Q3SU0HuDtwdkH8aAOefLHYDbPk5wngqYYNYXev4hfols7t+2rHoAMeYGWcLzDhwAAAAASUVORK5CYII14cd8b047f1782800d858b3438f2c525"/></a>
	       &nbsp;&nbsp;
           <a href="{$product_front->getProductUrl($product->get_id())}" target="_blank"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAEbgAABG4B0KOyaAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAEDSURBVDiNxdPBKgRwEMfxz2hDbcpyoRzcrMSd4g1cHT2CvIl9ELd9AycXtbEhJyk3izig8HcwtDbrsHsw9W++M/1/M/Of+kcpxTA2MpQagTWsDKg/rmALmzjpM9V7H/EympUMmqWU3YgYxQ6eMt9Bq0s0XkppQUQ0oOKnjWC/lHL5W8uIqPfmegu8YjEi5vCCscx/8STOezv2FrxGG7Pp25hPfxUR439N8IYqZvCQHu6Tq3mnb4F3n9stOMIGnnGWfIvD3wrUckFfb77BVHIn+Q13WIgIqGWskR0HOY1APZcE05hIXsV28h4uuiZ6TL6M7s8UEetY8rcdlFJOvzX//hs/AJdjUWXP/VJ+AAAAAElFTkSuQmCCa4adae95d603717782154b539e945ff0"/></a>
           <br/>
	   </td>
	</tr>
{/foreach}
</table>