<template>
    <AuthenticatedLayout>
    <div class="flex justify-center py-16">
        <div class="w-4/5">
            <h1 class="text-center text-2xl font-bold mb-12">Mentions Légales</h1>

            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2">1. Présentation du site</h2>
                <p class="mb-2">Conformément aux dispositions des articles 6-III et 19 de la Loi n° 2004-575 du 21 juin 2004 pour la Confiance dans l'économie numérique, dite L.C.E.N., il est porté à la connaissance des utilisateurs et visiteurs du site [Nom du Site] les présentes mentions légales.</p>
                <p>La connexion et la navigation sur le site ([URL du Site]) par l’utilisateur implique acceptation intégrale et sans réserve des présentes mentions légales.</p>
            </div>

            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2">2. Éditeur du site</h2>
                <p class="mb-2">Le site AnyWear est édité par :</p>
                <p class="mb-2"><strong>Nom ou Raison sociale :</strong> AnyWear</p>
                <p class="mb-2"><strong>Adresse :</strong> 6 rue de Libération</p>
                <p class="mb-2"><strong>Téléphone :</strong> 04 00 00 00 00</p>
                <p class="mb-2"><strong>Adresse email :</strong> anywear@contact.fr</p>
                <p class="mb-2"><strong>N° SIRET :</strong> [Numéro SIRET]</p>
                <p><strong>Directeur de la publication :</strong> [Nom du directeur de publication]</p>
            </div>

            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2">3. Hébergement</h2>
                <p class="mb-2">Le site est hébergé par :</p>
                <p class="mb-2"><strong>Nom de l'hébergeur :</strong> [Nom de l'hébergeur]</p>
                <p class="mb-2"><strong>Adresse :</strong> [Adresse de l'hébergeur]</p>
                <p><strong>Téléphone :</strong> [Numéro de téléphone de l'hébergeur]</p>
            </div>

            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2">4. Propriété intellectuelle</h2>
                <p class="mb-2">Le site ainsi que l'ensemble des contenus (textes, images, graphismes, logos, vidéos, icônes, sons, logiciels, etc.) sont protégés par les lois en vigueur en France en matière de propriété intellectuelle.</p>
                <p>Toute reproduction, distribution, modification, adaptation, retransmission ou publication, même partielle, de ces différents éléments est strictement interdite sans l’accord exprès par écrit de [Nom de la société ou de l'éditeur].</p>
            </div>

            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2">5. Données personnelles</h2>
                <p class="mb-2">L’utilisateur est informé des réglementations concernant la communication marketing, la loi du 21 Juin 2014 pour la confiance dans l’Économie Numérique, la Loi Informatique et Liberté du 06 Août 2004 ainsi que le Règlement Général sur la Protection des Données (RGPD : n° 2016-679).</p>
                <p class="mb-2"><strong>Responsable de la collecte des données personnelles :</strong> [Nom de la société ou de l'éditeur]</p>
                <p class="mb-2"><strong>Finalité des données collectées :</strong> [Décrire les finalités de la collecte des données]</p>
                <p class="mb-2">Droit d’accès, de rectification et d’opposition : Conformément à la réglementation européenne en vigueur, les utilisateurs de [Nom du Site] disposent des droits suivants :</p>
                <ul class="list-disc list-inside mb-2">
                    <li>droit d’accès (article 15 RGPD) et de rectification (article 16 RGPD), de mise à jour, de complétude des données des utilisateurs</li>
                    <li>droit de verrouillage ou d’effacement des données des utilisateurs à caractère personnel (article 17 RGPD), lorsqu’elles sont inexactes, incomplètes, équivoques, périmées, ou dont la collecte, l'utilisation, la communication ou la conservation est interdite</li>
                    <li>droit de retirer à tout moment un consentement (article 13-2c RGPD)</li>
                    <li>droit à la limitation du traitement des données des utilisateurs (article 18 RGPD)</li>
                    <li>droit d’opposition au traitement des données des utilisateurs (article 21 RGPD)</li>
                </ul>
                <p>Pour exercer ces droits, l’utilisateur peut contacter l'éditeur par email à l’adresse suivante : [Adresse email]</p>
            </div>

            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2">6. Liens hypertextes et cookies</h2>
                <p class="mb-2">Le site [Nom du Site] contient un certain nombre de liens hypertextes vers d’autres sites (partenaires, informations, etc.) mis en place avec l’autorisation de [Nom de la société ou de l'éditeur]. Cependant, [Nom de la société ou de l'éditeur] n’a pas la possibilité de vérifier le contenu des sites ainsi visités et décline donc toute responsabilité de ce fait quant aux risques éventuels de contenus illicites.</p>
                <p class="mb-2">L’utilisateur est informé que lors de ses visites sur le site [Nom du Site], un ou des cookies sont susceptibles de s’installer automatiquement sur son ordinateur par l’intermédiaire de son logiciel de navigation. Un cookie est un bloc de données qui ne permet pas d’identifier l’utilisateur, mais qui enregistre des informations relatives à la navigation de celui-ci sur le site.</p>
                <p>Le paramétrage du logiciel de navigation permet d’informer de la présence de cookie et éventuellement de les refuser de la manière décrite à l’adresse suivante : [Lien vers la page expliquant la gestion des cookies]</p>
            </div>

            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2">7. Droit applicable et attribution de juridiction</h2>
                <p>Tout litige en relation avec l’utilisation du site [Nom du Site] est soumis au droit français. Il est fait attribution exclusive de juridiction aux tribunaux compétents de [Ville où se trouve le siège de l'entreprise].</p>
            </div>
        </div>
    </div>
    </AuthenticatedLayout>
    <Footer/>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Footer from "@/Layouts/Footer.vue";

export default {
    name: "MentionsLegales",
    components: {Footer, AuthenticatedLayout},
};
</script>

<style scoped>
</style>
