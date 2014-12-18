<div class="a-center-line">
    <div class="a-center-line a-center-line-high-font">
        Informatique &nbsp;&nbsp;› &nbsp;&nbsp;Tablettes tactiles
    </div>
    <div class="a-center-line-thumbs">
        <img src="/img/product/img1.jpg" style="border:solid 1px orange;"/>
        <img src="/img/product/img2.jpg"/>
        <img src="/img/product/img3.jpg"/>
        <img src="/img/product/img4.jpg"/>
        <img src="/img/product/img5.jpg"/>
        <img src="/img/product/img6.jpg"/>
        <img src="/img/product/img7.jpg"/>
    </div>
    <div class="a-center-line-big-img">
        <img src="/img/product/img1b.jpg"/>
    </div>
    <div class="a-center-line-description">
        <h1>{$offer->get_product()->get_name()}</h1>
        de <a href="#">Asus</a><br/>
        <i class="stars"></i>
        <a href="#">{count($offer->get_product()->get_review())} commentaires client</a>  | <a href="#">5 questions ayant reçu une réponse</a>
        <hr/>
        Prix conseillé : &nbsp;&nbsp;<span class="price-strike"><strike>EUR {$offer->get_product()->get_market_price()}</strike></span><br/>
        Prix : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="price">EUR {$offer->get_price()}</span> <span class="free-shipping">LIVRAISON GRATUITE</span> <a href="#">Détails</a><br/>
        Économisez : &nbsp;&nbsp;&nbsp;<span class="price-reduction">EUR {$offer->get_product()->get_market_price()-$offer->get_price()} ({round(100)-round($offer->get_price()/$offer->get_product()->get_market_price()*100)}%)</span><br/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Tous les prix incluent la TVA.<br/>
        <span class="price-status">{$offer->get_offer_status()->get_name()}</span><br/>
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
        {if $panne.count > 0}<input type="checkbox"/> Inclure Garantie <a href="#">Panne 3 ans</a> pour <span class="price-reduction">EUR {if $panne.item[0]->service_price->get_price_type() == 'amount'}{number_format($panne.item[0]->service_price->get_price(),2,',','.')}{else}{round($offer->get_price()/100*$panne.item[0]->service_price->get_price(),2)}{/if}</span><br/><br/>{/if}
        <input type="checkbox"/> Inclure Garantie <a href="#">Casse et Vol 2 ans</a> pour <span class="price-reduction">EUR {if $cassevol.item[0]->service_price->get_price_type() == 'amount'}{number_format($cassevol.item[0]->service_price->get_price(),2,',','.')}{else}{round($offer->get_price()/100*$cassevol.item[0]->service_price->get_price(),2)}{/if}</span><br/><br/>
        Quantité : <select name="quantity"/>{section name=$i loop=10 start=1}<option value="{$i}">{$i}</option>{/section}</select><br/><br/>
        <center><input type="button" value="Ajouter au panier" style="width:100%;height:30px;"></center>
        <hr/>
        <center>Activez la commande 1-Click</center>
        <hr/>
        <center><input type="button" value="Ajouter à votre liste d'envies" style="width:100%;height:30px;"></center>
    </form>
</div>
<div class="cadre_bottom_large">
    <hr/>
    <h3>Produits fréquemment achetés ensemble</h3>
    <div><img src="/img/product/img1.jpg"/> + <img src="/img/product/imgp2_1.jpg"/></div>
    <div>
        <input type="checkbox"> Cet article : Asus FonePad 7 ME372CL-1A006A Tablette tactile 7" 16 Go, Android, Wi-Fi, Blanc - Fonction téléphone … EUR 209,47<br/><br/>
        <input type="checkbox"> IVSO Slim Smart Cover Housse pour ASUS Fonepad 7 LTE ME372CL Tablette (Noir) EUR 16,95
        <hr/>
    </div>
</div>