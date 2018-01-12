-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 12 Janvier 2018 à 09:37
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `monblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_billet`
--

CREATE TABLE `t_billet` (
  `BIL_ID` int(11) NOT NULL,
  `BIL_DATE` datetime NOT NULL,
  `BIL_TITRE` varchar(100) NOT NULL,
  `BIL_CONTENU` text NOT NULL,
  `BIL_VISIBLE` varchar(100) NOT NULL DEFAULT 'NON',
  `BIL_PHOTO` varchar(100) DEFAULT 'defaut'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_billet`
--

INSERT INTO `t_billet` (`BIL_ID`, `BIL_DATE`, `BIL_TITRE`, `BIL_CONTENU`, `BIL_VISIBLE`, `BIL_PHOTO`) VALUES
(23, '2017-10-03 00:00:00', 'Chapitre II', '<p style="color: #7e754b; font-size: 10px; margin: 10px;">Montius nos tumore inusitato quodam et novo ut rebellis et maiestati recalcitrantes Augustae per haec quae strepit incusat iratus nimirum quod contumacem praefectum, quid rerum ordo postulat ignorare dissimulantem formidine tenus iusserim custodiri.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Et quia Mesopotamiae tractus omnes crebro inquietari sueti praetenturis et stationibus servabantur agrariis, laevorsum flexo itinere Osdroenae subsederat extimas partes, novum parumque aliquando temptatum commentum adgressus. quod si impetrasset, fulminis modo cuncta vastarat. erat autem quod cogitabat huius modi.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Harum trium sententiarum nulli prorsus assentior. Nec enim illa prima vera est, ut, quem ad modum in se quisque sit, sic in amicum sit animatus. Quam multa enim, quae nostra causa numquam faceremus, facimus causa amicorum! precari ab indigno, supplicare, tum acerbius in aliquem invehi insectarique vehementius, quae in nostris rebus non satis honeste, in amicorum fiunt honestissime; multaeque res sunt in quibus de suis commodis viri boni multa detrahunt detrahique patiuntur, ut iis amici potius quam ipsi fruantur.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Ergo ego senator inimicus, si ita vultis, homini, amicus esse, sicut semper fui, rei publicae debeo. Quid? si ipsas inimicitias, depono rei publicae causa, quis me tandem iure reprehendet, praesertim cum ego omnium meorum consiliorum atque factorum exempla semper ex summorum hominum consiliis atque factis mihi censuerim petenda.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Etenim si attendere diligenter, existimare vere de omni hac causa volueritis, sic constituetis, iudices, nec descensurum quemquam ad hanc accusationem fuisse, cui, utrum vellet, liceret, nec, cum descendisset, quicquam habiturum spei fuisse, nisi alicuius intolerabili libidine et nimis acerbo odio niteretur. Sed ego Atratino, humanissimo atque optimo adulescenti meo necessario, ignosco, qui habet excusationem vel pietatis vel necessitatis vel aetatis. Si voluit accusare, pietati tribuo, si iussus est, necessitati, si speravit aliquid, pueritiae. Ceteris non modo nihil ignoscendum, sed etiam acriter est resistendum.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Quare talis improborum consensio non modo excusatione amicitiae tegenda non est sed potius supplicio omni vindicanda est, ut ne quis concessum putet amicum vel bellum patriae inferentem sequi; quod quidem, ut res ire coepit, haud scio an aliquando futurum sit. Mihi autem non minori curae est, qualis res publica post mortem meam futura, quam qualis hodie sit.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">His cognitis Gallus ut serpens adpetitus telo vel saxo iamque spes extremas opperiens et succurrens saluti suae quavis ratione colligi omnes iussit armatos et cum starent attoniti, districta dentium acie stridens adeste inquit viri fortes mihi periclitanti vobiscum.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Quam ob rem cave Catoni anteponas ne istum quidem ipsum, quem Apollo, ut ais, sapientissimum iudicavit; huius enim facta, illius dicta laudantur. De me autem, ut iam cum utroque vestrum loquar, sic habetote.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Excogitatum est super his, ut homines quidam ignoti, vilitate ipsa parum cavendi ad colligendos rumores per Antiochiae latera cuncta destinarentur relaturi quae audirent. hi peragranter et dissimulanter honoratorum circulis adsistendo pervadendoque divites domus egentium habitu quicquid noscere poterant vel audire latenter intromissi per posticas in regiam nuntiabant, id observantes conspiratione concordi, ut fingerent quaedam et cognita duplicarent in peius, laudes vero supprimerent Caesaris, quas invitis conpluribus formido malorum inpendentium exprimebat.</p>', 'OUI', 'defaut'),
(24, '2017-10-04 00:00:00', 'Chapitre III', '<p style="color: #7e754b; font-size: 10px; margin: 10px;">Utque aegrum corpus quassari etiam levibus solet offensis, ita animus eius angustus et tener, quicquid increpuisset, ad salutis suae dispendium existimans factum aut cogitatum, insontium caedibus fecit victoriam luctuosam.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Quanta autem vis amicitiae sit, ex hoc intellegi maxime potest, quod ex infinita societate generis humani, quam conciliavit ipsa natura, ita contracta res est et adducta in angustum ut omnis caritas aut inter duos aut inter paucos iungeretur.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Nemo quaeso miretur, si post exsudatos labores itinerum longos congestosque adfatim commeatus fiducia vestri ductante barbaricos pagos adventans velut mutato repente consilio ad placidiora deverti.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Quo cognito Constantius ultra mortalem modum exarsit ac nequo casu idem Gallus de futuris incertus agitare quaedam conducentia saluti suae per itinera conaretur, remoti sunt omnes de industria milites agentes in civitatibus perviis.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Quam ob rem cave Catoni anteponas ne istum quidem ipsum, quem Apollo, ut ais, sapientissimum iudicavit; huius enim facta, illius dicta laudantur. De me autem, ut iam cum utroque vestrum loquar, sic habetote.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Montius nos tumore inusitato quodam et novo ut rebellis et maiestati recalcitrantes Augustae per haec quae strepit incusat iratus nimirum quod contumacem praefectum, quid rerum ordo postulat ignorare dissimulantem formidine tenus iusserim custodiri.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Et est admodum mirum videre plebem innumeram mentibus ardore quodam infuso cum dimicationum curulium eventu pendentem. haec similiaque memorabile nihil vel serium agi Romae permittunt. ergo redeundum ad textum.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Duplexque isdem diebus acciderat malum, quod et Theophilum insontem atrox interceperat casus, et Serenianus dignus exsecratione cunctorum, innoxius, modo non reclamante publico vigore, discessit.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Quam ob rem id primum videamus, si placet, quatenus amor in amicitia progredi debeat. Numne, si Coriolanus habuit amicos, ferre contra patriam arma illi cum Coriolano debuerunt? num Vecellinum amici regnum adpetentem, num Maelium debuerunt iuvare?</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Ideo urbs venerabilis post superbas efferatarum gentium cervices oppressas latasque leges fundamenta libertatis et retinacula sempiterna velut frugi parens et prudens et dives Caesaribus tamquam liberis suis regenda patrimonii iura permisit.</p>', 'OUI', 'defaut'),
(25, '2017-10-05 00:00:00', 'Chapitre IV', '<p style="color: #7e754b; font-size: 10px; margin: 10px;">Quare talis improborum consensio non modo excusatione amicitiae tegenda non est sed potius supplicio omni vindicanda est, ut ne quis concessum putet amicum vel bellum patriae inferentem sequi; quod quidem, ut res ire coepit, haud scio an aliquando futurum sit. Mihi autem non minori curae est, qualis res publica post mortem meam futura, quam qualis hodie sit.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Hac ex causa conlaticia stipe Valerius humatur ille Publicola et subsidiis amicorum mariti inops cum liberis uxor alitur Reguli et dotatur ex aerario filia Scipionis, cum nobilitas florem adultae virginis diuturnum absentia pauperis erubesceret patris.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Abusus enim multitudine hominum, quam tranquillis in rebus diutius rexit, ex agrestibus habitaculis urbes construxit multis opibus firmas et viribus, quarum ad praesens pleraeque licet Graecis nominibus appellentur, quae isdem ad arbitrium inposita sunt conditoris, primigenia tamen nomina non amittunt, quae eis Assyria lingua institutores veteres indiderunt.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Quibus occurrere bene pertinax miles explicatis ordinibus parans hastisque feriens scuta qui habitus iram pugnantium concitat et dolorem proximos iam gestu terrebat sed eum in certamen alacriter consurgentem revocavere ductores rati intempestivum anceps subire certamen cum haut longe muri distarent, quorum tutela securitas poterat in solido locari cunctorum.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim, quod tibi ita videri necesse est, non satis politus iis artibus, quas qui tenent, eruditi appellantur aut ne deterruisset alios a studiis. quamquam te quidem video minime esse deterritum.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Et eodem impetu Domitianum praecipitem per scalas itidem funibus constrinxerunt, eosque coniunctos per ampla spatia civitatis acri raptavere discursu. iamque artuum et membrorum divulsa conpage superscandentes corpora mortuorum ad ultimam truncata deformitatem velut exsaturati mox abiecerunt in flumen.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde aetatem ingressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque vergens in senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Hac ex causa conlaticia stipe Valerius humatur ille Publicola et subsidiis amicorum mariti inops cum liberis uxor alitur Reguli et dotatur ex aerario filia Scipionis, cum nobilitas florem adultae virginis diuturnum absentia pauperis erubesceret patris.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Et interdum acciderat, ut siquid in penetrali secreto nullo citerioris vitae ministro praesente paterfamilias uxori susurrasset in aurem, velut Amphiarao referente aut Marcio, quondam vatibus inclitis, postridie disceret imperator. ideoque etiam parietes arcanorum soli conscii timebantur.</p>', 'OUI', 'defaut'),
(26, '2017-10-05 00:00:00', 'Chapitre V', '<p style="color: #7e754b; font-size: 10px; margin: 10px;">Quare talis improborum consensio non modo excusatione amicitiae tegenda non est sed potius supplicio omni vindicanda est, ut ne quis concessum putet amicum vel bellum patriae inferentem sequi; quod quidem, ut res ire coepit, haud scio an aliquando futurum sit. Mihi autem non minori curae est, qualis res publica post mortem meam futura, quam qualis hodie sit.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Hac ex causa conlaticia stipe Valerius humatur ille Publicola et subsidiis amicorum mariti inops cum liberis uxor alitur Reguli et dotatur ex aerario filia Scipionis, cum nobilitas florem adultae virginis diuturnum absentia pauperis erubesceret patris.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Abusus enim multitudine hominum, quam tranquillis in rebus diutius rexit, ex agrestibus habitaculis urbes construxit multis opibus firmas et viribus, quarum ad praesens pleraeque licet Graecis nominibus appellentur, quae isdem ad arbitrium inposita sunt conditoris, primigenia tamen nomina non amittunt, quae eis Assyria lingua institutores veteres indiderunt.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam, non nulla levius actitata constaret, post multorum clades Apollinares ambo pater et filius in exilium acti cum ad locum Crateras nomine pervenissent, villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide, ut mandatum est, fractis cruribus occiduntur.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Quibus occurrere bene pertinax miles explicatis ordinibus parans hastisque feriens scuta qui habitus iram pugnantium concitat et dolorem proximos iam gestu terrebat sed eum in certamen alacriter consurgentem revocavere ductores rati intempestivum anceps subire certamen cum haut longe muri distarent, quorum tutela securitas poterat in solido locari cunctorum.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Haec igitur Epicuri non probo, inquam. De cetero vellem equidem aut ipse doctrinis fuisset instructior est enim, quod tibi ita videri necesse est, non satis politus iis artibus, quas qui tenent, eruditi appellantur aut ne deterruisset alios a studiis. quamquam te quidem video minime esse deterritum.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Et eodem impetu Domitianum praecipitem per scalas itidem funibus constrinxerunt, eosque coniunctos per ampla spatia civitatis acri raptavere discursu. iamque artuum et membrorum divulsa conpage superscandentes corpora mortuorum ad ultimam truncata deformitatem velut exsaturati mox abiecerunt in flumen.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Eius populus ab incunabulis primis ad usque pueritiae tempus extremum, quod annis circumcluditur fere trecentis, circummurana pertulit bella, deinde aetatem ingressus adultam post multiplices bellorum aerumnas Alpes transcendit et fretum, in iuvenem erectus et virum ex omni plaga quam orbis ambit inmensus, reportavit laureas et triumphos, iamque vergens in senium et nomine solo aliquotiens vincens ad tranquilliora vitae discessit.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Hac ex causa conlaticia stipe Valerius humatur ille Publicola et subsidiis amicorum mariti inops cum liberis uxor alitur Reguli et dotatur ex aerario filia Scipionis, cum nobilitas florem adultae virginis diuturnum absentia pauperis erubesceret patris.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Et interdum acciderat, ut siquid in penetrali secreto nullo citerioris vitae ministro praesente paterfamilias uxori susurrasset in aurem, velut Amphiarao referente aut Marcio, quondam vatibus inclitis, postridie disceret imperator. ideoque etiam parietes arcanorum soli conscii timebantur.</p>', 'OUI', 'defaut'),
(27, '2017-10-06 00:00:00', 'Chapitre VI', '<p style="color: #7e754b; font-size: 10px; margin: 10px;">Sed maximum est in amicitia parem esse inferiori. Saepe enim excellentiae quaedam sunt, qualis erat Scipionis in nostro, ut ita dicam, grege. Numquam se ille Philo, numquam Rupilio, numquam Mummio anteposuit, numquam inferioris ordinis amicis, Q. vero Maximum fratrem, egregium virum omnino, sibi nequaquam parem, quod is anteibat aetate, tamquam superiorem colebat suosque omnes per se posse esse ampliores volebat.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Accedebant enim eius asperitati, ubi inminuta vel laesa amplitudo imperii dicebatur, et iracundae suspicionum quantitati proximorum cruentae blanditiae exaggerantium incidentia et dolere inpendio simulantium, si principis periclitetur vita, a cuius salute velut filo pendere statum orbis terrarum fictis vocibus exclamabant.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Quam ob rem circumspecta cautela observatum est deinceps et cum edita montium petere coeperint grassatores, loci iniquitati milites cedunt. ubi autem in planitie potuerint reperiri, quod contingit adsidue, nec exsertare lacertos nec crispare permissi tela, quae vehunt bina vel terna, pecudum ritu inertium trucidantur.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Nemo quaeso miretur, si post exsudatos labores itinerum longos congestosque adfatim commeatus fiducia vestri ductante barbaricos pagos adventans velut mutato repente consilio ad placidiora deverti.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Itaque verae amicitiae difficillime reperiuntur in iis qui in honoribus reque publica versantur; ubi enim istum invenias qui honorem amici anteponat suo? Quid? Haec ut omittam, quam graves, quam difficiles plerisque videntur calamitatum societates! Ad quas non est facile inventu qui descendant. Quamquam Ennius recte.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Nam sole orto magnitudine angusti gurgitis sed profundi a transitu arcebantur et dum piscatorios quaerunt lenunculos vel innare temere contextis cratibus parant, effusae legiones, quae hiemabant tunc apud Siden, isdem impetu occurrere veloci. et signis prope ripam locatis ad manus comminus conserendas denseta scutorum conpage semet scientissime praestruebant, ausos quoque aliquos fiducia nandi vel cavatis arborum truncis amnem permeare latenter facillime trucidarunt.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Harum trium sententiarum nulli prorsus assentior. Nec enim illa prima vera est, ut, quem ad modum in se quisque sit, sic in amicum sit animatus. Quam multa enim, quae nostra causa numquam faceremus, facimus causa amicorum! precari ab indigno, supplicare, tum acerbius in aliquem invehi insectarique vehementius, quae in nostris rebus non satis honeste, in amicorum fiunt honestissime; multaeque res sunt in quibus de suis commodis viri boni multa detrahunt detrahique patiuntur, ut iis amici potius quam ipsi fruantur.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Raptim igitur properantes ut motus sui rumores celeritate nimia praevenirent, vigore corporum ac levitate confisi per flexuosas semitas ad summitates collium tardius evadebant. et cum superatis difficultatibus arduis ad supercilia venissent fluvii Melanis alti et verticosi, qui pro muro tuetur accolas circumfusus, augente nocte adulta terrorem quievere paulisper lucem opperientes. arbitrabantur enim nullo inpediente transgressi inopino adcursu adposita quaeque vastare, sed in cassum labores pertulere gravissimos.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Novitates autem si spem adferunt, ut tamquam in herbis non fallacibus fructus appareat, non sunt illae quidem repudiandae, vetustas tamen suo loco conservanda; maxima est enim vis vetustatis et consuetudinis. Quin in ipso equo, cuius modo feci mentionem, si nulla res impediat, nemo est, quin eo, quo consuevit, libentius utatur quam intractato et novo. Nec vero in hoc quod est animal, sed in iis etiam quae sunt inanima, consuetudo valet, cum locis ipsis delectemur, montuosis etiam et silvestribus, in quibus diutius commorati sumus.</p>\r\n<p style="color: #7e754b; font-size: 10px; margin: 10px;">Dumque ibi diu moratur commeatus opperiens, quorum translationem ex Aquitania verni imbres solito crebriores prohibebant auctique torrentes, Herculanus advenit protector domesticus, Hermogenis ex magistro equitum filius, apud Constantinopolim, ut supra rettulimus, populari quondam turbela discerpti. quo verissime referente quae Gallus egerat, damnis super praeteritis maerens et futurorum timore suspensus angorem animi quam diu potuit emendabat.</p>', 'NON', 'defaut');

-- --------------------------------------------------------

--
-- Structure de la table `t_commentaire`
--

CREATE TABLE `t_commentaire` (
  `COM_ID` int(11) NOT NULL,
  `COM_DATE` datetime DEFAULT CURRENT_TIMESTAMP,
  `COM_AUTEUR` varchar(100) NOT NULL,
  `COM_CONTENU` varchar(200) NOT NULL,
  `BIL_ID` int(11) NOT NULL,
  `COM_SIGNALEMENT` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_commentaire`
--

INSERT INTO `t_commentaire` (`COM_ID`, `COM_DATE`, `COM_AUTEUR`, `COM_CONTENU`, `BIL_ID`, `COM_SIGNALEMENT`) VALUES
(48, '2017-12-27 18:36:37', 'admin', 'Ceci est un commentaire 3                                                           ', 27, 0),
(49, '2018-01-05 13:51:02', 'admin', 'Ceci est un commentaire', 23, 1),
(50, '2018-01-05 15:26:56', 'user', 'commentaires                    ', 26, 0);

-- --------------------------------------------------------

--
-- Structure de la table `t_histoire`
--

CREATE TABLE `t_histoire` (
  `histoire_id` int(11) NOT NULL,
  `histoire_photo` varchar(100) NOT NULL DEFAULT 'photoAuteur.JPG',
  `histoire_texte` varchar(500) NOT NULL,
  `histoire_citation` varchar(100) NOT NULL,
  `histoire_titre` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_histoire`
--

INSERT INTO `t_histoire` (`histoire_id`, `histoire_photo`, `histoire_texte`, `histoire_citation`, `histoire_titre`) VALUES
(1, 'photoAuteur.JPG', '<p>consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>', 'To be or not to be', 'Mon histoire');

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateur`
--

CREATE TABLE `t_utilisateur` (
  `UTIL_ID` int(11) NOT NULL,
  `UTIL_LOGIN` varchar(100) NOT NULL,
  `UTIL_MDP` varchar(100) NOT NULL,
  `UTIL_NOM` varchar(100) DEFAULT NULL,
  `UTIL_PRENOM` varchar(100) DEFAULT NULL,
  `UTIL_DNAISSANCE` date DEFAULT NULL,
  `UTIL_EMAIL` varchar(100) DEFAULT NULL,
  `UTIL_GRADE` varchar(100) NOT NULL DEFAULT 'Utilisateur',
  `UTIL_ACCES` varchar(100) NOT NULL DEFAULT 'Autorise',
  `UTIL_PHOTO` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_utilisateur`
--

INSERT INTO `t_utilisateur` (`UTIL_ID`, `UTIL_LOGIN`, `UTIL_MDP`, `UTIL_NOM`, `UTIL_PRENOM`, `UTIL_DNAISSANCE`, `UTIL_EMAIL`, `UTIL_GRADE`, `UTIL_ACCES`, `UTIL_PHOTO`) VALUES
(1, 'admin', '$2y$10$x8a6jWSMaCZjHxZJzsAHAenC9AkxZHxPbLFWPdNT/2x5No2FyajNC', 'admin', '', NULL, '', 'Administrateur', 'Autorise', 'Leloo.PNG'),
(6, 'moderateur', '$2y$10$CW0x8qjXAzknihaFikpJqOwvUdytmbpUQabS6bPhvFvs851lXTW1.', 'moderateur', 'moderateur', '1980-12-01', 'modo@test.com', 'Moderateur', 'Autorise', NULL),
(8, 'user', '$2y$10$QG/eIw/xrgx0h2BRdvqx7u/6IUJKurmcO89SPYPW0xvBXl3KxCdoi', 'utilisateur', 'utilisateur', '1980-12-01', 'user@test.com', 'Utilisateur', 'Autorise', NULL),
(21, 'azerty', '$2y$10$0KeDr3olOWfkoPKl/iaV.ODpDL9PRS3LVKe62WYWHND7H1Qywa15e', 'azerty', 'azerty', '1980-12-01', 'azerty@toto.com', 'Utilisateur', 'Banni', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_billet`
--
ALTER TABLE `t_billet`
  ADD PRIMARY KEY (`BIL_ID`);

--
-- Index pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  ADD PRIMARY KEY (`COM_ID`),
  ADD KEY `fk_com_bil` (`BIL_ID`);

--
-- Index pour la table `t_histoire`
--
ALTER TABLE `t_histoire`
  ADD PRIMARY KEY (`histoire_id`);

--
-- Index pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  ADD PRIMARY KEY (`UTIL_ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_billet`
--
ALTER TABLE `t_billet`
  MODIFY `BIL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  MODIFY `COM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT pour la table `t_histoire`
--
ALTER TABLE `t_histoire`
  MODIFY `histoire_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  MODIFY `UTIL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_commentaire`
--
ALTER TABLE `t_commentaire`
  ADD CONSTRAINT `fk_com_bil` FOREIGN KEY (`BIL_ID`) REFERENCES `t_billet` (`BIL_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
