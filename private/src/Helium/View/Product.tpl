<div class="a-center-line">
    <div class="a-center-line a-center-line-high-font">
        Informatique &nbsp;&nbsp;› &nbsp;&nbsp;Tablettes tactiles
    </div>
    <div class="a-center-line-thumbs">
        {foreach from=$images key=$iKey item=$oImage}
            <img src="{url alias='product_img' iIdProductImg=$oImage->get_id() iWidth=50 iHeight=50}" {if $iKey == 0}style="border:solid 1px orange;"{/if}/>
        {/foreach}
    </div>
    <div class="a-center-line-big-img">
        <img src="{url alias='product_img' iIdProductImg=$images[0]->get_id()}" width="350"/>
    </div>
    <div class="a-center-line-description">
        <h1>{$offer->get_product()->get_name()}</h1>
        {if count($offer->get_refund_offer_by_offer()) > 0}<div style="margin-top:10px;margin-bottom:20px;"><a href="{$offer->get_refund_offer_by_offer()[0]->get_refund_offer()[0]->get_url()}">{$offer->get_refund_offer_by_offer()[0]->get_refund_offer()[0]->get_name()}</a></div>{/if}
        de <a href="#">Asus</a><br/>
        {$offer->get_product()->get_review()[0]}
        <i class="stars{$reviews_rate}"></i>
        <a href="#">{count($offer->get_product()->get_review())} commentaires client</a>  | <a href="#">{$count_question} questions ayant reçu une réponse</a>
        <hr/>
        {if $offer->get_product()->get_market_price() > 0 }Prix conseillé : &nbsp;&nbsp;<span class="price-strike"><strike>EUR {number_format($offer->get_product()->get_market_price()*$offer->get_offer_vat_country(array('id_country'=>$country))[0]->get_vat()->get_vat_percent(),2,',','.')}</strike></span><br/>{/if}
        Prix : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="price">EUR {number_format($offer->get_price()*$offer->get_offer_vat_country(array('id_country'=>$country))[0]->get_vat()->get_vat_percent(),2,',','.')}</span> <span class="free-shipping">LIVRAISON GRATUITE</span> <a href="#">Détails</a><br/>
        Économisez : &nbsp;&nbsp;&nbsp;<span class="price-reduction">EUR {number_format($offer->get_product()->get_market_price()*$offer->get_offer_vat_country(array('id_country'=>$country))[0]->get_vat()->get_vat_percent()-$offer->get_price()*$offer->get_offer_vat_country(array('id_country'=>$country))[0]->get_vat()->get_vat_percent(),2,',','.')} ({round(100)-round($offer->get_price()/$offer->get_product()->get_market_price()*100)}%)</span><br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Tous les prix incluent la TVA.<br/>
        <span class="price-status">{if $offer->get_quantity_public() < 20}Il ne reste plus que {$offer->get_quantity_public()} exemplaire(s){/if} {$offer->get_offer_status()->get_name()}</span><br/>
        Expédié et vendu par Hélium. {if $offer->get_gift_possible()}Emballage cadeau disponible.{/if}<br/><br/>
        Voulez-vous le faire livrer le mardi 16 décembre ? Commandez-le dans les <span style="color:green;font-weight:bold;">3 h et 27 mins</span> et 
        choisissez la <b>Livraison en 1 jour ouvré</b> au cours de votre commande. <a href="#">En savoir plus</a>.
        <br/><br/>
        {$offer->get_product()->get_short_description()}
        › <a href="#">Voir plus de détails</a>
        <hr/>
        Nos prix incluent l'éco-participation (<a href="#">de quoi s'agit-il ?</a>)<br/><br/>
        Pour toute information sur la rémunération copie privée, sur son paiement et son éventuel remboursement, veuillez consulter 
        <a href="#">cette page</a>
    </div>
</div>
<div class="a-right-div" style="border:solid 1px gray;padding:10px;">
    <form>
        {if $premium.count > 0}<input type="checkbox"/> <b>Continuer avec la livraison en 1 jour ouvré GRATUITE avec <a href="#">Hélium Premium</a></b><br/><br/>{/if}
        {if $panne.count > 0}<input type="checkbox"/> Inclure Garantie <a href="#">Panne 3 ans</a> pour <span class="price-reduction">EUR {if $panne.item[0]->service_price->get_price_type() == 'amount'}{number_format($panne.item[0]->service_price->get_price()*$panne.item[0]->get_vat()->get_vat_percent(),2,',','.')}{else}{round($offer->get_price()/100*$panne.item[0]->service_price->get_price(),2)}{/if}</span><br/><br/>{/if}
        {if $cassevol.count > 0}<input type="checkbox"/> Inclure Garantie <a href="#">Casse et Vol 2 ans</a> pour <span class="price-reduction">EUR {if $cassevol.item[0]->service_price->get_price_type() == 'amount'}{number_format($cassevol.item[0]->service_price->get_price()*$cassevol.item[0]->get_vat()->get_vat_percent(),2,',','.')}{else}{round($offer->get_price()/100*$cassevol.item[0]->service_price->get_price(),2)}{/if}</span><br/><br/>{/if}
        Quantité : <select name="quantity"/>{section name=$i loop=10 start=1}<option value="{$i}">{$i}</option>{/section}</select><br/><br/>
        <center><input type="button" value="Ajouter au panier" style="width:100%;height:30px;"></center>
        <hr/>
        <center>Activez la commande 1-Click</center>
        <hr/>
        <center><input type="button" value="Ajouter à votre liste d'envies" style="width:100%;height:30px;"></center>
    </form>
</div>
{if count($all_offers) > 0}
<div class="a-right-div" style="border:solid 1px gray;padding:10px;">
    <center><b>Autres vendeurs sur Helium</b></center>
    {foreach item=$one_offer from=$all_offers}
        <hr/>
    <div style="width:50%;float:left;">
        <span class="price">EUR {number_format($one_offer->get_price()*$one_offer->get_offer_vat_country(array('id_country'=>$country))[0]->get_vat()->get_vat_percent(),2,',','.')}</span><br/>
        + Livraison gratuite<br/>
        Vendu par : {$one_offer->get_merchant()->get_name()}
    </div>
    <div style="width:50%;float:left;">
        <input type="button" value="Ajouter au panier" style="width:100%;height:30px;">
    </div>
     {/foreach}
</div>
{/if}
<div class="a-right-div">
    <center>Vous l'avez déjà ? <input type="button" value="Vendez sur Helium" style="height:30px;"></center>
    <br/>
    <center>Partager : Facebook Twitter Pinterest</center>
</div>
<div class="cadre_bottom_large">
    <hr/>
    <h3>Produits fréquemment achetés ensemble</h3>
    <div class="cross-sell-image"><img src="{url alias='product_img' iIdProductImg=$images[0]->get_id() iWidth=50 iHeight=50}"/> + <img src="/img/product/imgp2_1.jpg"/></div>
    <div class="cross-sell-price">
        Prix pour les deux : EUR {number_format($offer->get_price()*$offer->get_offer_vat_country(array('id_country'=>$country))[0]->get_vat()->get_vat_percent(),2,',','.')}<br/>
        <input type="button" value="Ajouter les deux au panier" style="height:20px;font-size:10px;">
    </div>
    <div class="cross-sell-form">
        <input type="checkbox" checked="checked" onclick="cross_sell();" name="cross1"> Cet article : {$offer->get_product()->get_name()} … <font color="red">EUR {number_format($offer->get_price()*$offer->get_offer_vat_country(array('id_country'=>$country))[0]->get_vat()->get_vat_percent(),2,',','.')}</font><br/><br/>
        <input type="checkbox" checked="checked" onclick="cross_sell();" name="cross2"> IVSO Slim Smart Cover Housse pour ASUS Fonepad 7 LTE ME372CL Tablette (Noir) <font color="red">EUR 16,95</font>
        <script>
             function cross_sell() {
                
                if ($('input[name=cross1]').is(':checked') && $('input[name=cross2]').is(':checked')) {
                    $('.cross-sell-price').html('Prix pour les deux : EUR {number_format($offer->get_price()*$offer->get_offer_vat_country(array('id_country'=>$country))[0]->get_vat()->get_vat_percent()+$value_cross,2,',','.')}<br/><input type="button" value="Ajouter les deux au panier" style="height:20px;font-size:10px;">');
                }
                else if ($('input[name=cross1]').is(':checked') && !$('input[name=cross2]').is(':checked')) {
                    $('.cross-sell-price').html('Prix : EUR {number_format($offer->get_price()*$offer->get_offer_vat_country(array('id_country'=>$country))[0]->get_vat()->get_vat_percent(),2,',','.')}<br/><input type="button" value="Ajouter au panier" style="height:20px;font-size:10px;">');
                }
                else if (!$('input[name=cross1]').is(':checked') && $('input[name=cross2]').is(':checked')) {
                    $('.cross-sell-price').html('Prix : EUR {number_format($value_cross,2,',','.')}<br/><input type="button" value="Ajouter au panier" style="height:20px;font-size:10px;">');
                }
             }
        </script>
        <hr style="margin-bottom:0px;"/>
    </div>
</div>
<div class="cadre_bottom_large">
    <h3>Les clients ayant consulté cet article ont également regardé</h3>
    {foreach from=$other_offer item=$one_offer}
        <div class="product-vertical">
            <img src="/product/img/{$one_offer->get_user_visit_offer()->get_offer()[0]->get_product()->get_product_image()[0]->get_id()}/100/100.jpg"/><br/>
            <a href="#">{$one_offer->get_user_visit_offer()->get_offer()[0]->get_product()->get_name()}</a><br/>
            <font color="red">EUR {number_format($one_offer->get_user_visit_offer()->get_offer()[0]->get_price()*$one_offer->get_user_visit_offer()->get_offer()[0]->get_offer_vat_country()[0]->get_vat()->get_vat_percent(),2,',','.')}</font>
        </div>
    {/foreach}
    <div class="cadre_bottom_large">
        <hr/>
    </div>
</div>
<div class="cadre_bottom_large">
    <h3 style="margin-top:0px;">Produits Sponsorisés similaires à cet article <span style="color:black;font-size:12px;">(<a href="#">De quoi s'agit-il ?</a>)</span></h3>
    {foreach from=$sponsored_offer item=$one_offer}
        <div class="product-vertical">
            <img src="/product/img/{$one_offer->get_offer()->get_product()->get_product_image()[0]->get_id()}/100/100.jpg"/><br/>
            <a href="#">{$one_offer->get_offer()->get_product()->get_name()}</a><br/>
            <font color="red">EUR {number_format($one_offer->get_offer()->get_price()*$one_offer->get_offer()->get_offer_vat_country()[0]->get_vat()->get_vat_percent(),2,',','.')}</font>
        </div>
    {/foreach}
    <div class="cadre_bottom_large">
        <hr/>
    </div>
</div>
<div class="cadre_bottom_large">
    <h3 style="margin-top:0px;">Offres spéciales et liens associés</h3>
    <div class="cadre_bottom_large">
        <ul>
            {if $offer->get_id_merchant() == 1}<li>Pour l'achat de ce produit, téléchargez l'album "Christmas Classics" pour 1 euro au lieu de 5,99 euros. <a href="#">Plus d'informations</a> (des restrictions s'appliquent){/if}
            <li><b>Boutique de Noël : <a href="#">Découvrez toutes nos idées cadeaux et promotions</a></b>
            <li><b>Économisez jusqu'à 10% sur les applis et jeux avec Hélium Coins</b> sur l'<a href="#">App-Shop Helium pour Android et Tablette Helium</a>. <a href="#">En savoir plus</a>.
            <li>Offres de remboursement, prix chocs, packs promo, venez vite profiter de <a href="#">nos promotions Informatique</a> du moment !
            <li>Profitez des <b><a href="#">Offres Reconditionnées</a></b>. Offres Reconditionnées est un service d'Helium.fr vous permettant d'acheter à prix réduits des articles d'occasion, retournés par nos clients, endommagés dans nos entrepôts ou par les transporteurs.
            <li><b>Souhaitez un Joyeux Noël à vos proches en leur offrant des <a href="#">chèques-cadeaux Helium.fr</a>.</b>
            <li> Nouveau : découvrez les applis et les jeux que vous préférez pour votre <a href="#">mobile</a> et <a href="#">tablette Android</a> sur l'<b>App-Shop Helium</b> et <a href="#">téléchargez chaque jour une application offerte</a>.
            <li><a href="#"><b>Gratuit</b> : téléchargez l'application Helium</a> pour <b>iPhone, iPad, Android ou Windows Phone</b> ou découvrez la <b>nouvelle application <a href="#">Helium pour Tablette Android</a></b> !
        </ul>
   </div>
    <div class="cadre_bottom_large">
        <hr/>
    </div>
</div>
