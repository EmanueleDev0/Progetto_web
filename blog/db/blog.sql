-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 10, 2024 alle 19:59
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `articoli`
--

CREATE TABLE `articoli` (
  `id` int(6) UNSIGNED NOT NULL,
  `titolo` varchar(60) NOT NULL,
  `contenuto` text NOT NULL,
  `autore` varchar(90) NOT NULL,
  `nome_giornale` varchar(30) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `immagine` varchar(256) NOT NULL,
  `data_pubblicazione` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `articoli`
--

INSERT INTO `articoli` (`id`, `titolo`, `contenuto`, `autore`, `nome_giornale`, `categoria`, `immagine`, `data_pubblicazione`) VALUES
(5, 'Gas, \"mercato Libero\": Cosa Cambia Dal 10 Gen', 'ltre 6 milioni di famiglie passeranno dal mercato tutelato del gas a quello libero il prossimo 10 gennaio. Addio, quindi, al sistema che prevedeva condizioni economiche e contrattuali stabilite dall\'Autorità Arera e portava a prezzi calmierati. Tra pochi giorni ci sarà un cambio di passo importante che le proteste dei consumatori non sono riuscite a rinviare. A luglio, poi, succederà lo stesso anche per quel che riguarda la luce. Va sottolineato, comunque, che in nessun caso ci potrà essere un\'interruzione della fornitura di energia. Il timore maggiore, come riporta La Stampa, è quello di prezzi molto più cari rispetto al passato. \r\n\r\nDa questo punto di vista, non è per niente ottimista il Codacons: \"Siamo convinti che la fine del mercato tutelato si rivelerà una strage per le tasche dei consumatori. Questo sia per la forte volatilità dei prezzi dell\'energia, con i mercati internazionali che continuano ad essere soggetti a speculazioni e anomalie, sia per la mancata previsione di controlli a tappeto in tutta Italia sugli operatori del mercato libero e sulle pratiche scorrette ed aggressive a danno degli utenti\". Il prossimo 10 gennaio, comunque, non tutti passeranno subito al mercato libero. Bisogna distinguere, infatti, tra clienti vulnerabili e clienti non vulnerabili. Questi ultimi sono tenuti a passare al mercato libero, scegliendo se restare con lo stesso venditore - anche se con offerta diversa e libera - oppure se rivolgersi ad altri venditori. Se non viene fatta nessuna scelta, allora il cliente passerà automaticamente a una fornitura con lo stesso venditore. Si tratta di una fornitura \"Placet\", acronimo che sta per \"Prezzo Libero A Condizioni Equiparate di Tutela\". Di cosa si tratta? Di un\'offerta in cui le condizioni economiche sono liberamente decise dal venditore e rinnovate ogni 12 mesi.', 'VittorioFeltri', 'Libero', 'economia', 'https://img2.liberoquotidiano.it/images/2024/01/02/130705616-6ebc48fe-1d41-40e3-8424-7d688e5389f6.jpg', '2024-01-03 12:59:27'),
(8, 'Omicidio A Messina', 'E\' successo a Messina un ragazzo sulla ventina ha preso a coltellate un altro ragazzo colpevole di non aver organizzato una partita. Il nome del soggetto è Christian Bombara che con 55 fendenti ha ucciso il povero Adel Shatani originario della Libia. Seguono aggiornamenti.', 'RiccardoTrevisani', 'Mediaset', 'cronaca', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQCiX77dDnXDxLYA12vWKnH1uIoPzC85mv-nA&usqp=CAU', '2023-12-30 17:15:07'),
(9, 'Forza Italia, Tajani: cerchiamo consensi dai cittadini', '\"Non cerchiamo consensi tra le file degli alleati. Vogliamo cercare consensi nella società civile e nel grande partito dell\'astensione\". Lo ha detto il segretario di Forza Italia, Antonio Tajani, in una conferenza stampa nella sede del partito dove ha annunciato alcune adesioni a FI a livello locale tra cui l\'ufficializzazione dell\'ingresso di Angelo Tripodi, consigliere regionale del Lazio.', 'RiccardoTrevisani', 'Mediaset', 'politica', 'https://img-prod.tgcom24.mediaset.it/images/2024/01/08/112247998-1b2e6f92-cf28-4dde-bee5-2042cf2f2d45.png', '2024-01-10 15:36:10'),
(10, 'Violenza Verbale', 'Purtroppo, ancora oggi, succede di dover sentire storie come quella accaduta a Messina, dove un ragazzo di 21 anni di nome Antonio Ciliberto viene accusato di razzismo nei confronti di Adel Shatani. I due si considerano amici tuttavia il secondo continua a ricevere insulti di natura razzista da parte del primo a causa del colore della pelle. Ad oggi Antonio è ricoverato in reparto psichiatria e tenuto fermo tramite una camicia di forza, mentre il povero Adel è in terapia da un bravo psicologo che lo possa convincere che il colore della sua pelle non è poi così scura.', 'RiccardoTrevisani', 'Mediaset', 'cronaca', 'https://www.neuro-psi.it/wp-content/uploads/2017/09/bullismo@2x.jpg', '2024-01-09 15:32:13'),
(11, 'Terremoto In Giappone', 'Una scossa di terremoto di magnitudo 7.5 è stata avvertita in Giappone alle 16,10 (le 8,10 in Italia) con epicentro a circa 40 chilometri a Nord-Est di Anamizu, in una penisola nel mar del Giappone di fronte alla Corea. Le autorità hanno diramato un’allerta per un importante tsunami con onde fino a 3 metri di altezza sulle coste occidentali dell’isola Honshu, alcune ore dopo l’allerta è stata diminuita.', 'RiccardoTrevisani', 'Mediaset', 'cronaca', 'https://www.ansa.it/webimages/news_base/2024/1/2/833e10932f8856987c105a5e74824712.jpg', '2024-01-02 13:32:04'),
(12, 'Social Card 2024', 'Ricarica al via per la social card Dedicata a te: dal 15 dicembre sono disponibili i nuovi 77,2o euro aggiuntivi di bonus benzina. Dalla stessa data saranno distribuite le ulteriori carte non ancora assegnate agli aventi diritto.\r\n\r\n\r\nL’INPS ha pubblicato al riguardo tutte le indicazioni sull’incremento della somma a disposizione ed anche sull’estensione del contributo economico (Carta Solidale Acquisti), per la cui fruizione è stata diposta la proroga dell’attivazione al 31 gennaio 2024.\r\n\r\n\r\nTutti i beneficiaridovranno utilizzare interamente le somme accreditate entro e non oltre il 15 marzo 2024', 'MassimoMartinelli', 'Il Messaggero', 'economia', 'https://cdn.pmi.it/f4PcXPkF1SXBjRCkmNpQGH9SDAY=/650x350/smart/https://www.pmi.it/app/uploads/2023/12/schermata-2023-12-15-alle-084710-e1702629115929.png', '2024-01-02 13:42:54'),
(13, 'Renzi Travolge Giuseppe Conte: \"Ipocrita 2023', 'Tra Giuseppe Conte e Matteo Renzi finisce in rissa. Dopo le accuse sui redditi, adesso il tono dello scontro si alza e il leader di Italia Viva mette nel mirino in modo duro l\'ex premier dei Cinque Stelle. Renzi usa parole forti e sfida a viso aperto proprio Conte. \"Giuseppe Conte mi ha attaccato sui miei redditi. Credo che sia il vero vincitore del premio ’Ipocrita 2023’, un premio che Bobo Giachetti aveva ribattezzato con altra espressione in passato. Cioè Conte paga meno tasse di un operaio e si permette di attaccare chi paga più tasse di lui? Non è incredibile?\", scrive il leader di Italia Viva, Matteo Renzi, nella sua Enews.\r\n\r\n\"Se vogliamo fare un dibattito serio sulla politica estera, ci sono e ci sto. Specie in questo 2024 così decisivo per il futuro del pianeta. Se invece dobbiamo replicare alle diffamazioni e alle insinuazioni, beh, si sappia che ci siamo stancati di prendere lezioni di moralismo di chi non sa che cosa sia la morale. O al massimo lo sa talmente bene da avere una doppia morale. Replicheremo colpo su colpo. E chiederemo confronti televisivi che non ci daranno mai, perché quelli come Conte prima alludono, poi scappano: il coraggio non sanno che cosa sia\", conclude. Insomma lo scontro resta aperto e di fatto ormai tra il leader di Italia Viva e quello del Movimento Cinque Stelle è iniziato un duello dagli esiti imprevedibili. ', 'VittorioFeltri', 'Libero', 'politica', 'https://img2.liberoquotidiano.it/images/2024/01/03/101702483-5abb01ee-17a2-437f-93f1-c93c3f4e4587.jpg', '2024-01-03 13:01:13'),
(14, 'Milan, Ufficiale Il Ritorno Di Gabbia', 'Matteo Gabbia torna a casa e lo fa come probabilmente non si sarebbe mai aspettato. Dopo aver lasciato il Milan in estate per il Villarreal, il difensore nativo di Busto Arsizio è stato richiesto da Stefano Pioli e dal club rossonero che, visti i numerosi infortuni, ha deciso di puntare su un \"giovane d\'esperienza\" come si dice in questi casi. La notizia del suo approdo a Milano era nell\'aria da tempo, ma la conferma è arrivata soltanto poche ore fa con il club spagnolo che ha acconsentito a interrompere anzitempo il prestito.', 'RedazioneSportMediaset', 'Sport Mediaset', 'sport', 'https://img-prod.sportmediaset.mediaset.it/images/2024/01/03/111106366-b203a5fd-dfda-4ce9-a609-2ff6cd31eafc.jpg', '2024-01-03 13:05:29'),
(15, 'Napoli, Con Samardzic Non è Ancora Fatta: Sul', 'No, non sarà il remake della telenovela della scorsa estate quando il passaggio di Samardzic all\'Inter saltò dopo che il centrocampista aveva già effettuato le visite mediche, però trattare con il padre-agente del giocatore serbo non è semplice. Diciamo così... E allora, rispetto alle previsioni degli scorsi giorni, i tempi del suo trasferimento al Napoli si sono un poco allungati. Insomma, la volontà delle parti in gioco - compresa l\'Udinese - è quella di procedere e di giungere a una conclusione positiva, ma restano ancora diversi tasselli da sistemare. Tra i club ballano ancora alcuni milioni di differenza tra domanda e offerta ma tra i 20+5 messi sul tavolo dal presidente De Laurentiis e i 27 richiesti dai friulani c\'è spazio per un accordo non difficile da siglare. E\' sul fronte ingaggio che invece la trattativa è ancora tutta in divenire: 2 milioni netti a stagioni sono quelli offerti dal club azzurro, tra i 2,5 e i 3 quelli richiesti da Mladen Samardzic. Si discute ancora, con il nodo anche dei diritti di immagine, con sullo sfondo l\'interesse della Lazio che però, al momento, non sembra spaventare seriamente il Napoli.\r\n\r\nNapoli che in tanto ha chiuso per Pasquale Mazzocchi che sarà un nuovo giocatore a disposizione di Mazzarri dopo che la società azzurra ha trovato l\'accordo con la Salernitana per il trasferimento dell\'esterno per circa 3 milioni di euro. Nella giornata di oggi svolgerà le visite mediche prima di firmare il nuovo contratto da tre anni e mezzo.', 'RedazioneSportMediaset', 'Sport Mediaset', 'sport', 'https://img-prod.sportmediaset.mediaset.it/images/2024/01/03/073151879-adfcd701-0ef9-449b-85f0-322b0827121e.jpg', '2024-01-03 13:09:22'),
(16, 'Michael Schumacher, Gli Auguri Della Ferrari ', 'Toccante messaggio della scuderia di Maranello in occasione del 55° compleanno di Michael Schumacher: \"Buon compleanno Michael, siamo sempre con te\" si legge nel post della Ferrari. Il post si chiude con un cuore ed è corredato da una foto di Schumi che esulta \'in rosso\' e l\'immagine della sua monoposto quando era un pilota di Maranello', 'RedazioneSkySport', 'SkySport', 'motori', 'https://f1grandprix.motorionline.com/wp-content/uploads/2020/01/Ferrari_compleanno_Schumi_-1024x512.jpg', '2024-01-03 13:28:47'),
(17, 'Bagnaia, Bautista E Bulega: Il 2023 è Stato L', 'Si chiude il 2023, è stato un anno magico per la Ducati, diventata la casa di riferimento a due ruote nel motorsport. L\'azienda di Borgo Panigale ha firmato una tripletta per quanto riguarda i Mondiali piloti (Bagnaia in MotoGP, Bautista in Superbike, Bulega in Supersport), oltre ai titoli costruttori e team. Merito della sua struttura tecnica, che ha innovato i sistemi di lavoro e ha sfruttato il regolamento al meglio: il genio italiano combinato con un approccio moderno', 'RedazioneSkySport', 'SkySport', 'motori', 'https://cdn-img.moto.it/images/34435486/HOR_WIDE/2040x/pecco-bagnaia.jpeg', '2024-01-03 13:39:07'),
(18, 'Golden Globes: Storia Dell\'abito Di Marilyn Monroe', 'Nonostante la sua fama planetaria, Marilyn Monroe non riscuote altrettanto successo in materia di premi, nemmeno all’apice della sua carriera nella Vecchia Hollywood. Infatti, i Golden Globes del 1962 sono una delle poche occasioni in cui l\'attrice abbia ricevuto un riconoscimento per il suo talento. Quell\'anno, Marilyn vince l\'Henrietta Award nella categoria World Film Favorite Female (in precedenza, aveva vinto solo altri due Golden Globes). Naturalmente, a rendere ancora più iconico tale momento è il suo caratteristico stile esplosivo, rappresentato da un abito che merita di essere ricordato.\r\n\r\nLa Monroe sale sul palco con un abito aderente di paillettes con scollo a V di Norman Norell, uno dei designer più sottovalutati della moda (i fan hanno anche ipotizzato che gli orecchini di diamanti che l’attrice indossa quella sera le fossero stati regalati da Frank Sinatra). Di un’intensa sfumatura verde smeraldo, l\'abito che Norell ha disegnato per Marilyn Monroe sembra ancora oggi sorprendentemente fresco e attuale: qualsiasi celebrità potrebbe sfoggiarlo per una cerimonia di premiazione e nessuno sospetterebbe mai che si tratti di un modello di settant\'anni fa.', 'RedazioneVogue', 'Vogue', 'moda', 'https://compass-media.vogue.it/photos/6038aa58c08eae357f105313/2:3/w_1920,c_limit/GettyImages-73996543.jpg', '2024-01-08 22:27:01'),
(19, 'Comfy: Il Nuovo Modo Di Vestirsi', 'Comfy è una delle parole da tenere a mente per creare degli outfit di tendenza nel 2024, almeno ora che l\'anno è appena iniziato e si parte con “buoni propositi” che riguardano una vita più sana, dalla dieta post abbuffata ai ritmi più lenti. Il relax è sicuramente un valore aggiunto nella frenesia della quotidianità. Ma riprenderci del tempo per noi stessi lo si può fare attraverso una colazione completa, una buona lettura o attraverso le scelte del guardaroba. Niente, infatti, ci farà sentire meglio come indossare una tuta anche fuori casa', 'RedazioneVogue', 'Vogue', 'moda', 'https://compass-media.vogue.it/photos/65917da3a58592d54486a864/1:1/w_1920,c_limit/409981075_886235576511971_290742468678643554_n.jpg', '2024-01-08 20:00:15'),
(20, 'Come Modificare Un Video Su IPhone', 'Vorresti creare un bel montaggio video utilizzando i filmati che hai girato con il tuo iPhone ma non hai voglia di esportare tutto sul computer e “armeggiare” con programmi tipo iMovie o Adobe Premiere? Allora ho una buona notizia da darti, puoi fare tutto direttamente dallo smartphone senza inutili perdite di tempo.\r\n\r\nEvidentemente non te ne sei mai accorto, ma esistono diverse app per l’editing video che consentono di modificare i filmati girati con iPhone senza esportarli prima sul computer. Sono tutte estremamente semplici da utilizzare e i risultati che riescono a produrre sono a dir poco sbalorditivi. Pensa: utilizzandole potrai non solo montare e tagliare le scene dei video, ma anche correggere la loro prospettiva, applicare loro effetti speciali, aggiungere titoli, musiche di sottofondo e molto altro ancora.\r\n\r\nI video, al termine dell’elaborazione, possono essere salvati direttamente nel rullino di iOS e si possono condividere online su servizi quali Facebook, YouTube e X (Twitter). Allora, si può sapere che altro aspetti? Leggi i miei suggerimenti su come modificare un video su iPhone e cerca di metterli in pratica scegliendo l’app più adatta alle tue finalità. Scommetto che resterai stupito dalla qualità dei risultati che riuscirai a ottenere!', 'SalvatoreAranzulla', 'Aranzulla', 'informatica', 'https://www.aranzulla.it/wp-content/contenuti/2016/12/ipv0-588x280.jpg', '2024-01-03 13:50:58'),
(21, 'Come Rimpicciolire Le Foto Su Instagram Story', 'Utilizzi Instagram da diverso tempo ma, solo di recente, hai iniziato a condividere foto e video con i tuoi follower tramite le storie. infatti, hai riscontrato dei problemi nell\'impiegare questo strumento del social network: vorresti caricare un\'immagine nella storia di Instagram, ridimensionandola, ma non sai come riuscirci.\r\n\r\nCome dici? Le cose stanno proprio così ed è per questo che ti domandi come rimpicciolire le foto su Instagram story? In tal caso non preoccuparti, sono qui per aiutarti. In questo tutorial, infatti, ti fornirò tutte le informazioni utili relative all\'argomento, illustrandoti come riuscirci da smartphone oltre che da computer, avvalendoti dell\'apposita funzionalità nativa del social network\r\n\r\nSe, dunque, adesso non vedi l\'ora di saperne di più al riguardo, mettiti bello comodo e prenditi giusto qualche minuto di tempo libero. Segui attentamente le istruzioni che sto per fornirti e vedrai che riuscirai facilmente e velocemente nell\'intento che ti sei proposto. ', 'SalvatoreAranzulla', 'Aranzulla', 'informatica', 'https://www.aranzulla.it/wp-content/contenuti/2018/12/Schermata-2018-05-18-alle-11.44.14-285x200.jpg', '2024-01-03 13:51:55'),
(22, 'Falsi Miti E Luoghi Comuni Sui Capelli', 'Tanti sono i falsi miti sui capelli. Per lungo tempo, per esempio, si è creduto che lavare i capelli quotidianamente potesse indebolirli e causarne la caduta. In realtà lavare i capelli ogni giorno utilizzando uno shampoo adeguato favorisce la salute del cuoio capelluto e dei capelli stessi. Questo il tema al centro dell\'intervista, nell\'ambito del format tv dell\'Italpress Cosmetica & Benessere, di Antonino Di Pietro, direttore dell\'Istituto Dermoclinico Vita Cutis di Milano del Gruppo San Donato, a Fabio Rinaldi, dermatologo e Chief R&D Officer di Giuliani Spa.\r\nMILANO (ITALPRESS)', 'MassimoMartinelli', 'Il Messaggero', 'salute', 'https://insalacoclinic.com/wp-content/uploads/2019/05/capelliesalute-680x380.jpg', '2024-01-03 13:55:25'),
(23, 'Piastrine, Il Trattamento PRP', 'Il PRP è un trattamento di rigenerazione cellulare che sfrutta le proprietà del sangue di ricostruzione delle cellule. Il sangue prelevato dal paziente ed arricchito di fattori di crescita stimola la rigenerazione. Questo il tema al centro dell\'intervista, nell\'ambito del format tv dell\'Italpress Cosmetica & Benessere, di Antonino Di Pietro, direttore dell\'Istituto Dermoclinico Vita Cutis di Milano del Gruppo San Donato, a Luca Santoleri, dirigente primariale del Servizio Trasfusionale - Irccs ospedale San Raffaele di Milano.\r\nMILANO (ITALPRESS)', 'MassimoMartinelli', 'Il Messaggero', 'salute', 'https://www.clinicbiorigeneral.com/wp-content/uploads/2022/04/PRP-capelli-768x370.jpg', '2024-01-08 16:29:36'),
(44, 'Fratelli D\'Italia, Emanuele Pozzolo Sospeso', 'Il deputato Emanuele Pozzolo è stato sospeso dal gruppo parlamentare di Fratelli d\'Italia alla Camera. Lo ha deciso l\'ufficio di presidenza del gruppo, come spiegano fonti parlamentari.', 'Cesara Bonamici', 'Mediaset', 'politica', 'https://img-prod.tgcom24.mediaset.it/images/2024/01/09/141902389-90313b30-579a-4754-96c6-771b1995163e.jpg', '2024-01-10 15:40:59'),
(47, 'Ex Ilva, Si Lavora All\'uscita Di Arcelor Mittal', 'Sul futuro dell\'ex Ilva e uscire dall\'impasse con Arcelor Mittal sono due le ipotesi allo studio del governo: l\'amministrazione straordinaria o l\'amministrazione controllata. Lo scopo è salvare impianti e lavoratori ed evitare contenziosi. Mentre gli avvocati di Invitalia e di Arcelor Mittal sono al lavoro, gli indiani scoprono le carte: sarebbero disponibili a diluire la propria quota in Acciaierie d\'Italia dal 62% al 34%, ma senza mollare la governance. I sindacati sono stati convocati dal governo giovedì a Palazzo Chigi. Sul piano politico, intanto, si consuma lo scontro tra Carlo Calenda e il Movimento 5 Stelle in un rimpallo di responsabilità sul destino della più grande acciaieria d\'Europa ora a rischio chiusura.', 'Cesara Bonamici', 'Mediaset', 'economia', 'https://img-prod.tgcom24.mediaset.it/images/2024/01/09/200854472-26aee183-ecb6-4010-96ed-40d917a01fe9.jpg', '2024-01-10 16:27:44'),
(50, 'Influenza, ancora un milione di casi in Italia nell\'ult', 'Resta alto e sostanzialmente stabile rispetto alla scorsa settimana il numero di casi di sindromi simil-influenzali in Italia. Tra il 25 e il 31 dicembre, secondo il bollettino della sorveglianza \"RespiVirNet\" dell\'Istituto Superiore di Sanità sono stati poco più di 1 milione gli italiani messi a letto da virus respiratori, più di un terzo da virus influenzali. L\'incidenza delle sindromi simil-influenzali è stata pari a 17,5 casi per mille abitanti (era 17,7 nella settimana precedente). Sono ancora i bambini piccoli i più colpiti: nella fascia al di sotto dei cinque anni, il tasso è pari a 48,7 casi ogni mille.\n\nTra le Regioni, l\'incidenza più alta è stata registrata in Campania, con 24,51 casi ogni mille abitanti; seguono il Friuli-Venezia Giulia con 23,69 e l\'Umbria con 22,93. Si conferma la crescita della circolazione dei virus influenzali. Tra i campioni analizzati dai laboratori afferenti alla rete \"RespiVirNet\" il 37,5% è risultato positivo per l\'influenza (erano il 33,5% la scorsa settimana); il 22% era positivo per SarsCoV2, l\'11% per virus respiratorio sinciziale, mentre i rimanenti sono risultati positivi per altri virus respiratori', 'Cesara Bonamici', 'Mediaset', 'salute', 'https://img-prod.tgcom24.mediaset.it/images/2024/01/05/160317282-c405a7cb-2cef-4c6b-ba35-031b351eea4f.jpg', '2024-01-10 18:37:27');

-- --------------------------------------------------------

--
-- Struttura della tabella `giornalisti`
--

CREATE TABLE `giornalisti` (
  `id` int(6) UNSIGNED NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome_giornale` varchar(90) NOT NULL,
  `logo_giornale` varchar(256) NOT NULL,
  `data_iscrizione` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `giornalisti`
--

INSERT INTO `giornalisti` (`id`, `nome`, `cognome`, `email`, `password`, `nome_giornale`, `logo_giornale`, `data_iscrizione`) VALUES
(7, 'Cesara', 'Bonamici', 'cbonamici@gmail.com', '$2y$10$DctV8Jaoh7/GSqDw3ReDte.r6ivIUCy2IwclDdnyPMy4IDAIsVSyG', 'Mediaset', 'https://is1-ssl.mzstatic.com/image/thumb/Purple116/v4/cf/eb/ef/cfebef71-6bb2-c1f8-67b6-2a5e4d77dec7/AppIcon-0-0-1x_U007emarketing-0-0-0-9-0-0-sRGB-0-0-0-GLES2_U002c0-512MB-85-220-0-0.png/1200x630wa.png', '2024-01-09 14:28:33'),
(11, 'Vittorio', 'Feltri', 'vfeltri@gmail.com', '$2y$10$l.u/bM3S1Grk/5s8Rv.sk.hq/fEegk0O1poVkxuL6/BUAjHpU4xEu', 'Libero', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRM4sVGRgYWOvdMJeqQCNdk94m1IqKOU9_a6A&usqp=CAU', '2023-12-28 16:13:09'),
(12, 'Massimo', 'Martinelli', 'mmartinelli@gmail.com', '$2y$10$0nbH0i5wbpJGw67PYW.rWuGk4LBYyGS5F9ojSdX5f1En4j0EZcFUu', 'Il Messaggero', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/Il_Messaggero.svg/240px-Il_Messaggero.svg.png', '2024-01-02 13:35:03'),
(13, 'Redazione', 'SportMediaset', 'Rsportmediaset@gmail.com', '$2y$10$AQYfILZLCC2eqUggZFZpQOcPGVB3Nnr05qtioT0Vk7KdmxVW7gw6S', 'Sport Mediaset', 'https://www.sportmediaset.mediaset.it/static/images/logo-sport-mediaset.svg', '2024-01-03 13:04:06'),
(14, 'Redazione', 'SkySport', 'rskysport@gmail.com', '$2y$10$NUMsb29XN0EaADqGjI63tOxHCWj55vGIovPDIWTo0JmVTOMS0rJdS', 'SkySport', 'https://yt3.googleusercontent.com/bKydV-9WEUOhZf1o-yGZ9V4nxO3iR9qZjz2ka6TUNBM0F7_w-wcsAEseY7RAPw8ypANsDoSx1w=s900-c-k-c0x00ffffff-no-rj', '2024-01-03 13:26:49'),
(15, 'Redazione', 'Vogue', 'rvogue@gmail.com', '$2y$10$GFwVvsFUtZaLFo2hY/BYle57Vq83m9SmK10TAeVdtnLXdHWvdhVhu', 'Vogue', 'https://logos-world.net/wp-content/uploads/2021/11/Vogue-Symbol.png', '2024-01-03 13:41:16'),
(16, 'Salvatore', 'Aranzulla', 'saranzulla@gmail.com', '$2y$10$jvjdCld4AASlMrPwKmGCf.tgEY1tZRM22wWMYLAxmrjI7VP3DJJou', 'Aranzulla', 'https://mir-s3-cdn-cf.behance.net/project_modules/disp/1b145711667885.560fb6b71023e.jpg', '2024-01-03 13:49:40');

-- --------------------------------------------------------

--
-- Struttura della tabella `lettori`
--

CREATE TABLE `lettori` (
  `id` int(6) UNSIGNED NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `data_iscrizione` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `lettori`
--

INSERT INTO `lettori` (`id`, `nome`, `cognome`, `email`, `password`, `categorie`, `data_iscrizione`) VALUES
(3, 'Emanuele', 'Russo', 'Erusso@gmail.com', '$2y$10$xhVyj4z9yzx6kirwv/cWBOC6UTU9GlFn7X.q6gSdz82Z8qt0Y02rO', 'sport,motori,moda,informatica', '2024-01-09 14:22:18'),
(4, 'Luca', 'Ciraolo', 'lciraolo@gmail.com', '$2y$10$ZudBL8bcDr.3NnvOjJKbV.HrqXhF9r8.nE3.qXH4ozkr8dZyo8zAO', 'cronaca,politica,motori,salute', '2023-12-20 21:07:12'),
(5, 'Christian', 'Bombara', 'cbombara@gmail.com', '$2y$10$3q73r4wU2tFrmgtmsO9UruelqGUy5DZ0zTb9QTbSs8PJfvwz1fn6m', 'sport,motori,salute', '2023-12-21 15:06:20'),
(6, 'Antonio', 'Ciliberto', 'Aciliberto@gmail.com', '$2y$10$puYtP0SSi8GfqzjCuldEPO8mqWaXbD76A88ch54FhWAHFjk1aOjhm', 'sport,motori,moda', '2023-12-21 16:02:24'),
(19, 'Roberto', 'Russo', 'rrusso@gmail.com', '$2y$10$ctINNKexFuX5XEmfC9Naj.YLFbR346bC/iP0r1pZfP94q3yoDh8YK', 'moda,informatica', '2023-12-23 12:05:34'),
(22, 'Francesco', 'Bart', 'fbart@gmail.com', '$2y$10$.itv4acFuJySixe2NI/tcuDRWX09LFwxc3KqV68LkJiAjIpg9ajiq', 'sport,motori,informatica,salute', '2023-12-28 22:25:26'),
(23, 'Giuseppina', 'Talamo', 'gtalamo@gmail.com', '$2y$10$HN.oDmjUuIlbSmknJl4lBOfnDOYiw7ZxNsYONPCAT.bO/8aGWWZya', 'cronaca,economia,politica,moda,salute', '2024-01-02 13:46:17'),
(24, 'Davide', 'Mento', 'dmento@gmail.com', '$2y$10$6MsTCSIoIjc/ivV.ZwSRFejKoBw9HWa.EEyNX5yfwdzaskZbqlp2C', 'sport,motori,moda,informatica', '2024-01-07 13:52:36'),
(25, 'Pinco', 'Pallino', 'ppallino@gmail.com', '$2y$10$bQ469ORLI6vPlDC5CajSde21y1x/M/2F1SxJMVyIh/gm.7N1AP7g.', 'cronaca,economia,politica,salute', '2024-01-09 14:23:40');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `articoli`
--
ALTER TABLE `articoli`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `giornalisti`
--
ALTER TABLE `giornalisti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `lettori`
--
ALTER TABLE `lettori`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `articoli`
--
ALTER TABLE `articoli`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT per la tabella `giornalisti`
--
ALTER TABLE `giornalisti`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT per la tabella `lettori`
--
ALTER TABLE `lettori`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
