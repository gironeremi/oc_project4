<?php $title = 'Jean Forteroche'; ?>

<?php ob_start(); ?>
<!--
CONTENU ICI
-->
    <h3>liste des épisodes</h3>
    <div class="container">
        <div class="row">
            <div  class="card col-md-4">
                <h3>Chapitre 1: machin truc</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dui ante, hendrerit sed feugiat eu, tristique ac neque. Mauris at purus eu magna auctor fermentum at sed urna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas quis nisl elit. Cras ut mauris dignissim libero feugiat pharetra. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed eu condimentum nisi. Donec ultricies mi et imperdiet consequat. Sed finibus lacinia orci non accumsan. Proin nisl dui, dapibus ac diam fringilla, rhoncus semper velit.</p>
            </div>
            <div class="card col-md-4">
                <h3>Chapitre 2: machin bidule</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dui ante, hendrerit sed feugiat eu, tristique ac neque. Mauris at purus eu magna auctor fermentum at sed urna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas quis nisl elit. Cras ut mauris dignissim libero feugiat pharetra. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed eu condimentum nisi. Donec ultricies mi et imperdiet consequat. Sed finibus lacinia orci non accumsan. Proin nisl dui, dapibus ac diam fringilla, rhoncus semper velit.</p>
            </div>
            <div class="card col-md-4">
                <h3>Chapitre 3: machin chouette</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dui ante, hendrerit sed feugiat eu, tristique ac neque. Mauris at purus eu magna auctor fermentum at sed urna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas quis nisl elit. Cras ut mauris dignissim libero feugiat pharetra. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed eu condimentum nisi. Donec ultricies mi et imperdiet consequat. Sed finibus lacinia orci non accumsan. Proin nisl dui, dapibus ac diam fringilla, rhoncus semper velit.</p>
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>