<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$title = 'Contact'; ?>

<section id="contact">
    <div id="contactBio">
        <h2 class="h1-responsive font-weight-bold text-center my-4">Jean Forteroche</h2>
        <p class="text-center w-responsive mx-auto mb-5">Et Epigonus quidem amictu tenus philosophus, ut apparuit, prece frustra temptata, sulcatis lateribus mortisque metu admoto turpi confessione cogitatorum socium, quae nulla erant, fuisse firmavit cum nec vidisset 
            quicquam nec audisset penitus expers forensium rerum; Eusebius vero obiecta fidentius negans, suspensus in eodem gradu constantiae stetit latrocinium illud esse, non iudicium clamans.

            Circa hos dies Lollianus primae lanuginis adulescens, Lampadi filius ex praefecto, exploratius causam Maximino spectante, convictus codicem noxiarum artium nondum per aetatem firmato consilio descripsisse, exulque mittendus, ut sperabatur, patris inpulsu provocavit ad principem, et iussus ad eius comitatum duci, de fumo, ut aiunt, in flammam traditus Phalangio Baeticae consulari cecidit funesti carnificis manu.

            Primi igitur omnium statuuntur Epigonus et Eusebius ob nominum gentilitatem oppressi. praediximus enim Montium sub ipso vivendi termino his vocabulis appellatos fabricarum culpasse tribunos ut adminicula futurae molitioni pollicitos.</p>
    </div>

    <div id="contactFormulaire">
        <form action="/contact" method="POST" class="text-center border border-light p-4">
            <h2 class="h1-responsive font-weight-bold text-center my-2">Formulaire de contact</h2>
            <p class="text-center w-responsive mx-auto mb-5">Si vous désirez me contacter à propos d'un de mes livres ou pour tout autre chose, merci de remplir le formulaire suivant :</p>

            <input type="text" id="sujet" name="sujet" class="form-control mb-4" placeholder="Sujet">

            <div class="form-group">
                <textarea class="form-control rounded-0" id="message" name="message" rows="3" placeholder="Message"></textarea>
            </div>

            <button class="btn btn-info btn-block">Envoyer</button>
        </form>
    </div>
</section>

