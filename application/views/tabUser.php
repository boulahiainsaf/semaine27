
<table class="table table-striped table-bordered container-fluid col-lg-8">
    <thead>
    <tr>
        <th scope="col">Photo</th>

        <th scope="col">Référence</th>
        <th scope="col">Libell&eacute;</th>
        <th scope="col">Prix</th>
        <th scope="col">Stock</th>
        <th scope="col">Couleur</th>
        <th scope="col">quantité</th>
    </tr>
    </thead>
    <tbody>

    <?php
    foreach ($liste_produits as $row)
    {
        echo '<tr>';
        echo  '<th scope="row" class="table-warning">'.'<img src="'. base_url().'assets/images/'.$row->pro_id.'.'.$row->pro_photo.'"width="75">'.'</th>';

        echo'<td >'.$row->pro_ref.'</td>';
        echo '<td class="table-warning">'.$row->pro_libelle.'</a></td>';
        echo'<td >'.$row->pro_prix.'</td>';
        echo'<td>';if($row->pro_stock>0){echo 'en stock';}else{echo 'repture de stock';};echo'</td>';
        echo'<td>'.$row->pro_couleur.'</td>';
        echo'
        <td>



<!-- champ visible pour indiquer la quantité à commander -->
<input type="number" class="form-control" name="pro_qte" id="pro_qte" value="1">
<input type="hidden" name="pro_prix" id="pro_prix" value="'.$row->pro_prix.'">
<input type="hidden" name="pro_id" id="pro_id" value="'.$row->pro_id.'">
<input type="hidden" name="pro_libelle" id="pro_libelle" value="'.$row->pro_libelle.'">


<div class="form-group">
    <a href="'.base_url().'index.php/panier/ajouter/'.$row->pro_id.'">ajouter au panier</a>
</div>
</form>';
    }
    ?>
    </tr>


    </tbody>
</table>


