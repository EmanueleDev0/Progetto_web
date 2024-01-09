-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 07, 2024 alle 15:14
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
  `titolo` varchar(45) NOT NULL,
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
(9, 'Patto (di Stabilità) Chiaro, A', 'I cicli politici cambiano, i protagonisti si avvicendano, le crisi si moltiplicano, ma nella storia delle relazioni tra Italia e Unione europea c’è una costante nel tempo foriera di tensioni e incomprensioni: il Patto di stabilità e crescita. Cioè, il nucleo centrale della disciplina posta a presidio della sostenibilità dei conti pubblici nel quadro delle politiche di coordinamento e vigilanza dei bilanci nazionali.\r\nUna formula che in concreto, nel dibattito politico, si traduce nel rispetto o meno di due parametri percentuali che sono entrati nel tempo nel nostro vocabolario:\r\n\r\n\r\nil rapporto tra deficit di bilancio e Pil non deve portarsi oltre il 3%. Con deficit (o disavanzo) si intende la differenza tra entrate e uscite annuali di uno Stato; \r\nil rapporto tra debito pubblico complessivo e Pil non deve superare il 60%. \r\n‍\r\n\r\nSi tratta di soglie significative per Paesi altamente indebitati come l’Italia: basti pensare che, stando alla Nota di aggiornamento del Documento di economia e finanza (NaDef), che costituisce la base per la manovra di bilancio per il 2024, il disavanzo sale al 5,3% del Pil - anche per effetto della contabilizzazione dei crediti edilizi del Superbonus -, mentre il debito pubblico “vola” al 140,2%, ben oltre il doppio del valore massimo Ue (La Voce). Finora, però, l’Italia non è stata mai sanzionata. \r\n\r\n‍\r\n\r\nQuesto anche perché, con la pandemia da Covid-19, e in ragione del suo imponente impatto sull’economia e sui conti statali, nel marzo 2020 la Commissione europea ha attivato per la prima volta la clausola generale di salvaguardia - introdotta nel 2011 - che “congela”, di fatto, l’applicazione del Patto. La sospensione temporanea è stata poi mantenuta dopo l’inizio dell’invasione russa dell’Ucraina, ma sarà revocata a partire dal 2024 \r\n\r\n‍\r\n\r\nUn nuovo corso? A partire dal prossimo anno, insomma, sulla scorta dei conti 2023, potranno tornare ad applicarsi le sanzioni del cosiddetto braccio correttivo del Patto di stabilità, su cui ci soffermeremo in seguito. Così ha confermato la Commissione, che ha escluso, a più riprese, una proroga ulteriore della clausola generale di salvaguardia oltre il 2023 (Agi). E questo nonostante pressioni di segno opposto da alcune capitali, vista l’incertezza della congiuntura macroeconomica, in particolare a fronte di un imponente aumento dei tassi d’interesse che pesa sulle casse pubbliche dei Paesi più indebitati, come il nostro. \r\n\r\n‍\r\n\r\nIl graduale ritorno alla normalità si accompagna con l’entrata nel vivo di un antico esercizio, che stavolta non ha più scuse per essere ritardato, dopo la battuta d’arresto del 2020: la revisione, per la prima volta dalla crisi dell’Eurozona, della governance economica dell’Ue e delle regole sui bilanci statali. Fedele a un mantra: il Patto non riguarda solo la stabilità dei conti, ma pure la crescita economica, attraverso un necessario stimolo agli investimenti.\r\n\r\n‍\r\n\r\nA fine aprile la Commissione ha presentato una proposta normativa di riforma per conciliare meglio sostenibilità del debito e crescita. Attualmente, è in corso una serrata trattativa tra i governi dei Ventisette per raggiungere un compromesso prima della fine dell’anno. L’obiettivo è concludere l’iter legislativo, che coinvolge pure il Parlamento europeo, entro i primi mesi del 2024 e, quindi, prima della fine dell’attuale legislatura Ue. \r\n\r\n‍\r\n\r\nIl dibattito, come proviamo a illustrare in seguito, riguarda in particolare - come accade spesso sui dossier più spinosi a livello Ue - l’equilibrio tra “responsabilità e flessibilità”, due parole d’ordine care rispettivamente ai Paesi del Nord e del Sud Europa. Il “derby” è, in questo caso, esemplificato dalla necessità, da una parte, di prevedere target stringenti e obbligatori di taglio del debito in eccesso e, dall’altra, dalle opzioni per il trattamento di favore nei confronti delle spese per investimenti. \r\n\r\n‍\r\n\r\nI numeri su deficit e debito contenuti nella NaDef che abbiamo accennato prima aiutano a capire perché la riforma del Patto di stabilità e crescita rappresenta se non la madre di tutti i dossier, comunque uno snodo fondamentale nelle trattative tra Roma e Bruxelles. Tanto che, per giocare fino in fondo la sua partita, l’Italia ha provato a dare le carte (e calare l’asso) su più tavoli. Lo ha fatto, in particolare, sfruttando la coincidenza temporale e collegando le concessioni richieste lato disciplina dei conti a una presa d’iniziativa per superare lo stallo sulla ratifica del trattato di riforma del Meccanismo europeo di stabilità (Mes), la cui entrata in vigore è ad oggi impedita solo dal mancato ok del Parlamento italiano, tema a cui abbiamo dedicato un altro approfondimento. Tanto Bruxelles con Commissione e Consiglio, quanto gli altri pesi massimi tra i partner Ue, Germania in testa, non hanno tuttavia mostrato grande entusiasmo per questa la (più o meno esplicita) tattica negoziale (Repubblica).\r\n\r\n‍\r\n\r\nMa prima di entrare nel vivo del confronto attuale, cos’è (davvero) il Patto e come si arriva allo sperato punto di svolta di una revisione delle regole Ue sui bilanci pubblici? Proviamo a unire i puntini.', 'RiccardoTrevisani', 'Mediaset', 'politica', 'https://assets-global.website-files.com/64058ba7f813ce53130acde2/652963152a2f462b84eecee8_2c52789d-eaa2-426a-a321-a3b668c7ffb3.jpeg', '2023-12-30 17:26:42'),
(10, 'Violenza Verbale', 'Purtroppo, ancora oggi, succede di dover sentire storie come quella accaduta a Messina, dove un ragazzo di 21 anni di nome Antonio Ciliberto viene accusato di razzismo nei confronti di Adel Shatani. I due si considerano amici tuttavia il secondo continua a ricevere insulti di natura razzista da parte del primo a causa del colore della pelle. Ad oggi Antonio è ricoverato in reparto psichiatria e tenuto fermo tramite una camicia di forza, mentre il povero Adel è in terapia da un bravo psicologo che lo possa convincere che il colore della sua pelle non è poi così scura.', 'RiccardoTrevisani', 'Mediaset', 'cronaca', 'https://www.neuro-psi.it/wp-content/uploads/2017/09/bullismo@2x.jpg', '2024-01-01 11:56:51'),
(11, 'Terremoto In Giappone', 'Una scossa di terremoto di magnitudo 7.5 è stata avvertita in Giappone alle 16,10 (le 8,10 in Italia) con epicentro a circa 40 chilometri a Nord-Est di Anamizu, in una penisola nel mar del Giappone di fronte alla Corea. Le autorità hanno diramato un’allerta per un importante tsunami con onde fino a 3 metri di altezza sulle coste occidentali dell’isola Honshu, alcune ore dopo l’allerta è stata diminuita.', 'RiccardoTrevisani', 'Mediaset', 'cronaca', 'https://www.ansa.it/webimages/news_base/2024/1/2/833e10932f8856987c105a5e74824712.jpg', '2024-01-02 13:32:04'),
(12, 'Social Card 2024', 'Ricarica al via per la social card Dedicata a te: dal 15 dicembre sono disponibili i nuovi 77,2o euro aggiuntivi di bonus benzina. Dalla stessa data saranno distribuite le ulteriori carte non ancora assegnate agli aventi diritto.\r\n\r\n\r\nL’INPS ha pubblicato al riguardo tutte le indicazioni sull’incremento della somma a disposizione ed anche sull’estensione del contributo economico (Carta Solidale Acquisti), per la cui fruizione è stata diposta la proroga dell’attivazione al 31 gennaio 2024.\r\n\r\n\r\nTutti i beneficiaridovranno utilizzare interamente le somme accreditate entro e non oltre il 15 marzo 2024', 'MassimoMartinelli', 'Il Messaggero', 'economia', 'https://cdn.pmi.it/f4PcXPkF1SXBjRCkmNpQGH9SDAY=/650x350/smart/https://www.pmi.it/app/uploads/2023/12/schermata-2023-12-15-alle-084710-e1702629115929.png', '2024-01-02 13:42:54'),
(13, 'Renzi Travolge Giuseppe Conte: \"Ipocrita 2023', 'Tra Giuseppe Conte e Matteo Renzi finisce in rissa. Dopo le accuse sui redditi, adesso il tono dello scontro si alza e il leader di Italia Viva mette nel mirino in modo duro l\'ex premier dei Cinque Stelle. Renzi usa parole forti e sfida a viso aperto proprio Conte. \"Giuseppe Conte mi ha attaccato sui miei redditi. Credo che sia il vero vincitore del premio ’Ipocrita 2023’, un premio che Bobo Giachetti aveva ribattezzato con altra espressione in passato. Cioè Conte paga meno tasse di un operaio e si permette di attaccare chi paga più tasse di lui? Non è incredibile?\", scrive il leader di Italia Viva, Matteo Renzi, nella sua Enews.\r\n\r\n\"Se vogliamo fare un dibattito serio sulla politica estera, ci sono e ci sto. Specie in questo 2024 così decisivo per il futuro del pianeta. Se invece dobbiamo replicare alle diffamazioni e alle insinuazioni, beh, si sappia che ci siamo stancati di prendere lezioni di moralismo di chi non sa che cosa sia la morale. O al massimo lo sa talmente bene da avere una doppia morale. Replicheremo colpo su colpo. E chiederemo confronti televisivi che non ci daranno mai, perché quelli come Conte prima alludono, poi scappano: il coraggio non sanno che cosa sia\", conclude. Insomma lo scontro resta aperto e di fatto ormai tra il leader di Italia Viva e quello del Movimento Cinque Stelle è iniziato un duello dagli esiti imprevedibili. ', 'VittorioFeltri', 'Libero', 'politica', 'https://img2.liberoquotidiano.it/images/2024/01/03/101702483-5abb01ee-17a2-437f-93f1-c93c3f4e4587.jpg', '2024-01-03 13:01:13'),
(14, 'Milan, Ufficiale Il Ritorno Di Gabbia', 'Matteo Gabbia torna a casa e lo fa come probabilmente non si sarebbe mai aspettato. Dopo aver lasciato il Milan in estate per il Villarreal, il difensore nativo di Busto Arsizio è stato richiesto da Stefano Pioli e dal club rossonero che, visti i numerosi infortuni, ha deciso di puntare su un \"giovane d\'esperienza\" come si dice in questi casi. La notizia del suo approdo a Milano era nell\'aria da tempo, ma la conferma è arrivata soltanto poche ore fa con il club spagnolo che ha acconsentito a interrompere anzitempo il prestito.', 'RedazioneSportMediaset', 'Sport Mediaset', 'sport', 'https://img-prod.sportmediaset.mediaset.it/images/2024/01/03/111106366-b203a5fd-dfda-4ce9-a609-2ff6cd31eafc.jpg', '2024-01-03 13:05:29'),
(15, 'Napoli, Con Samardzic Non è Ancora Fatta: Sul', 'No, non sarà il remake della telenovela della scorsa estate quando il passaggio di Samardzic all\'Inter saltò dopo che il centrocampista aveva già effettuato le visite mediche, però trattare con il padre-agente del giocatore serbo non è semplice. Diciamo così... E allora, rispetto alle previsioni degli scorsi giorni, i tempi del suo trasferimento al Napoli si sono un poco allungati. Insomma, la volontà delle parti in gioco - compresa l\'Udinese - è quella di procedere e di giungere a una conclusione positiva, ma restano ancora diversi tasselli da sistemare. Tra i club ballano ancora alcuni milioni di differenza tra domanda e offerta ma tra i 20+5 messi sul tavolo dal presidente De Laurentiis e i 27 richiesti dai friulani c\'è spazio per un accordo non difficile da siglare. E\' sul fronte ingaggio che invece la trattativa è ancora tutta in divenire: 2 milioni netti a stagioni sono quelli offerti dal club azzurro, tra i 2,5 e i 3 quelli richiesti da Mladen Samardzic. Si discute ancora, con il nodo anche dei diritti di immagine, con sullo sfondo l\'interesse della Lazio che però, al momento, non sembra spaventare seriamente il Napoli.\r\n\r\nNapoli che in tanto ha chiuso per Pasquale Mazzocchi che sarà un nuovo giocatore a disposizione di Mazzarri dopo che la società azzurra ha trovato l\'accordo con la Salernitana per il trasferimento dell\'esterno per circa 3 milioni di euro. Nella giornata di oggi svolgerà le visite mediche prima di firmare il nuovo contratto da tre anni e mezzo.', 'RedazioneSportMediaset', 'Sport Mediaset', 'sport', 'https://img-prod.sportmediaset.mediaset.it/images/2024/01/03/073151879-adfcd701-0ef9-449b-85f0-322b0827121e.jpg', '2024-01-03 13:09:22'),
(16, 'Michael Schumacher, Gli Auguri Della Ferrari ', 'Toccante messaggio della scuderia di Maranello in occasione del 55° compleanno di Michael Schumacher: \"Buon compleanno Michael, siamo sempre con te\" si legge nel post della Ferrari. Il post si chiude con un cuore ed è corredato da una foto di Schumi che esulta \'in rosso\' e l\'immagine della sua monoposto quando era un pilota di Maranello', 'RedazioneSkySport', 'SkySport', 'motori', 'https://f1grandprix.motorionline.com/wp-content/uploads/2020/01/Ferrari_compleanno_Schumi_-1024x512.jpg', '2024-01-03 13:28:47'),
(17, 'Bagnaia, Bautista E Bulega: Il 2023 è Stato L', 'Si chiude il 2023, è stato un anno magico per la Ducati, diventata la casa di riferimento a due ruote nel motorsport. L\'azienda di Borgo Panigale ha firmato una tripletta per quanto riguarda i Mondiali piloti (Bagnaia in MotoGP, Bautista in Superbike, Bulega in Supersport), oltre ai titoli costruttori e team. Merito della sua struttura tecnica, che ha innovato i sistemi di lavoro e ha sfruttato il regolamento al meglio: il genio italiano combinato con un approccio moderno', 'RedazioneSkySport', 'SkySport', 'motori', 'https://cdn-img.moto.it/images/34435486/HOR_WIDE/2040x/pecco-bagnaia.jpeg', '2024-01-03 13:39:07'),
(18, 'Stile Grandpa, Ovvero I Giovani Che Si Veston', '“Sembri mio nonno”. Quante volte abbiamo sentito questa frase quando abbiamo scelto un maglione un po\' over o un paio di scarpe fuori moda. Eppure, quel maglione o quelle scarpe, ora, non sono mai stati così cool, perché parte dello stile grandpa che - letteralmente - vuol dire “stile da nonno”. E il riferimento non può essere più preciso: se la nonna con il suo armadio rappresenta un\'immagine più vezzosa, con la borsetta giusta, il rossetto impeccabile e la collana importante, quella del nonno è l\'estetica di chi cerca conforto in indumenti piuttosto pratici che, il più delle volte, sono lontani dal tempo in cui viviamo.', 'RedazioneVogue', 'Vogue', 'moda', 'https://i0.wp.com/www.fashionblognotes.com/wp-content/uploads/2014/02/emporio-armani.jpg?resize=600%2C407', '2024-01-03 13:45:30'),
(19, 'Come Indossare La Tuta Fuori Casa Per Creare ', 'Comfy è una delle parole da tenere a mente per creare degli outfit di tendenza nel 2024, almeno ora che l\'anno è appena iniziato e si parte con “buoni propositi” che riguardano una vita più sana, dalla dieta post abbuffata ai ritmi più lenti. Il relax è sicuramente un valore aggiunto nella frenesia della quotidianità. Ma riprenderci del tempo per noi stessi lo si può fare attraverso una colazione completa, una buona lettura o attraverso le scelte del guardaroba. Niente, infatti, ci farà sentire meglio come indossare una tuta anche fuori casa', 'RedazioneVogue', 'Vogue', 'moda', 'https://compass-media.vogue.it/photos/65917da3a58592d54486a864/1:1/w_1920,c_limit/409981075_886235576511971_290742468678643554_n.jpg', '2024-01-03 13:47:53'),
(20, 'Come Modificare Un Video Su IPhone', 'Vorresti creare un bel montaggio video utilizzando i filmati che hai girato con il tuo iPhone ma non hai voglia di esportare tutto sul computer e “armeggiare” con programmi tipo iMovie o Adobe Premiere? Allora ho una buona notizia da darti, puoi fare tutto direttamente dallo smartphone senza inutili perdite di tempo.\r\n\r\nEvidentemente non te ne sei mai accorto, ma esistono diverse app per l’editing video che consentono di modificare i filmati girati con iPhone senza esportarli prima sul computer. Sono tutte estremamente semplici da utilizzare e i risultati che riescono a produrre sono a dir poco sbalorditivi. Pensa: utilizzandole potrai non solo montare e tagliare le scene dei video, ma anche correggere la loro prospettiva, applicare loro effetti speciali, aggiungere titoli, musiche di sottofondo e molto altro ancora.\r\n\r\nI video, al termine dell’elaborazione, possono essere salvati direttamente nel rullino di iOS e si possono condividere online su servizi quali Facebook, YouTube e X (Twitter). Allora, si può sapere che altro aspetti? Leggi i miei suggerimenti su come modificare un video su iPhone e cerca di metterli in pratica scegliendo l’app più adatta alle tue finalità. Scommetto che resterai stupito dalla qualità dei risultati che riuscirai a ottenere!', 'SalvatoreAranzulla', 'Aranzulla', 'informatica', 'https://www.aranzulla.it/wp-content/contenuti/2016/12/ipv0-588x280.jpg', '2024-01-03 13:50:58'),
(21, 'Come Rimpicciolire Le Foto Su Instagram Story', 'Utilizzi Instagram da diverso tempo ma, solo di recente, hai iniziato a condividere foto e video con i tuoi follower tramite le storie. infatti, hai riscontrato dei problemi nell\'impiegare questo strumento del social network: vorresti caricare un\'immagine nella storia di Instagram, ridimensionandola, ma non sai come riuscirci.\r\n\r\nCome dici? Le cose stanno proprio così ed è per questo che ti domandi come rimpicciolire le foto su Instagram story? In tal caso non preoccuparti, sono qui per aiutarti. In questo tutorial, infatti, ti fornirò tutte le informazioni utili relative all\'argomento, illustrandoti come riuscirci da smartphone oltre che da computer, avvalendoti dell\'apposita funzionalità nativa del social network\r\n\r\nSe, dunque, adesso non vedi l\'ora di saperne di più al riguardo, mettiti bello comodo e prenditi giusto qualche minuto di tempo libero. Segui attentamente le istruzioni che sto per fornirti e vedrai che riuscirai facilmente e velocemente nell\'intento che ti sei proposto. ', 'SalvatoreAranzulla', 'Aranzulla', 'informatica', 'https://www.aranzulla.it/wp-content/contenuti/2018/12/Schermata-2018-05-18-alle-11.44.14-285x200.jpg', '2024-01-03 13:51:55'),
(22, 'Falsi Miti E Luoghi Comuni Sui Capelli', 'Tanti sono i falsi miti sui capelli. Per lungo tempo, per esempio, si è creduto che lavare i capelli quotidianamente potesse indebolirli e causarne la caduta. In realtà lavare i capelli ogni giorno utilizzando uno shampoo adeguato favorisce la salute del cuoio capelluto e dei capelli stessi. Questo il tema al centro dell\'intervista, nell\'ambito del format tv dell\'Italpress Cosmetica & Benessere, di Antonino Di Pietro, direttore dell\'Istituto Dermoclinico Vita Cutis di Milano del Gruppo San Donato, a Fabio Rinaldi, dermatologo e Chief R&D Officer di Giuliani Spa.\r\nMILANO (ITALPRESS)', 'MassimoMartinelli', 'Il Messaggero', 'salute', 'https://insalacoclinic.com/wp-content/uploads/2019/05/capelliesalute-680x380.jpg', '2024-01-03 13:55:25'),
(23, 'Piastrine, Il Trattamento PRP', 'Il PRP è un trattamento di rigenerazione cellulare che sfrutta le proprietà del sangue di ricostruzione delle cellule. Il sangue prelevato dal paziente ed arricchito di fattori di crescita stimola la rigenerazione. Questo il tema al centro dell\'intervista, nell\'ambito del format tv dell\'Italpress Cosmetica & Benessere, di Antonino Di Pietro, direttore dell\'Istituto Dermoclinico Vita Cutis di Milano del Gruppo San Donato, a Luca Santoleri, dirigente primariale del Servizio Trasfusionale - Irccs ospedale San Raffaele di Milano.\r\nMILANO (ITALPRESS)', 'MassimoMartinelli', 'Il Messaggero', 'salute', 'https://www.clinicbiorigeneral.com/wp-content/uploads/2022/04/PRP-capelli-768x370.jpg', '2024-01-04 15:22:08');

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
(7, 'Cesara', 'Bonamici', 'cbonamici@gmail.com', '$2y$10$DctV8Jaoh7/GSqDw3ReDte.r6ivIUCy2IwclDdnyPMy4IDAIsVSyG', 'Mediaset', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQiiPAD7m5PgUj9bezqAO6ZQx61aC3BWiF6HQ&usqp=CAU', '2023-12-28 16:11:11'),
(10, 'Riccardo', 'Trevisani', 'rtrevisani@gmail.com', '$2y$10$Bl9CtAx3bKjWXOlCTv88xu4VBH9P4KoIJ400tuJK3sRB7EFi4HkmO', 'Mediaset', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQiiPAD7m5PgUj9bezqAO6ZQx61aC3BWiF6HQ&usqp=CAU', '2023-12-28 16:11:26'),
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
(3, 'Emanuele', 'Russo', 'Erusso@gmail.com', '$2y$10$xhVyj4z9yzx6kirwv/cWBOC6UTU9GlFn7X.q6gSdz82Z8qt0Y02rO', 'sport,motori,moda,informatica', '2024-01-07 14:11:33'),
(4, 'Luca', 'Ciraolo', 'lciraolo@gmail.com', '$2y$10$ZudBL8bcDr.3NnvOjJKbV.HrqXhF9r8.nE3.qXH4ozkr8dZyo8zAO', 'cronaca,politica,motori,salute', '2023-12-20 21:07:12'),
(5, 'Christian', 'Bombara', 'cbombara@gmail.com', '$2y$10$3q73r4wU2tFrmgtmsO9UruelqGUy5DZ0zTb9QTbSs8PJfvwz1fn6m', 'sport,motori,salute', '2023-12-21 15:06:20'),
(6, 'Antonio', 'Ciliberto', 'Aciliberto@gmail.com', '$2y$10$puYtP0SSi8GfqzjCuldEPO8mqWaXbD76A88ch54FhWAHFjk1aOjhm', 'sport,motori,moda', '2023-12-21 16:02:24'),
(7, 'Ciccio', 'Pasticcio', 'cpasticcio@gmail.com', '$2y$10$oXUD4Y6OKEPstSOOJt8h9.hySayU73AXq59GI555LzFCy8FQRHttW', 'cronaca,economia,politica,sport,motori,moda,salute', '2023-12-22 12:07:05'),
(8, 'Pinco', 'Pallino', 'ppallino@gmail.com', '$2y$10$kK3iZTYUBvDJuyxxxoplK.buFiazZ8I9A0qK18XsI0F/c0av7baHu', 'sport,motori,moda,informatica', '2023-12-22 14:22:56'),
(19, 'Roberto', 'Russo', 'rrusso@gmail.com', '$2y$10$ctINNKexFuX5XEmfC9Naj.YLFbR346bC/iP0r1pZfP94q3yoDh8YK', 'moda,informatica', '2023-12-23 12:05:34'),
(22, 'Francesco', 'Bart', 'fbart@gmail.com', '$2y$10$.itv4acFuJySixe2NI/tcuDRWX09LFwxc3KqV68LkJiAjIpg9ajiq', 'sport,motori,informatica,salute', '2023-12-28 22:25:26'),
(23, 'Giuseppina', 'Talamo', 'gtalamo@gmail.com', '$2y$10$HN.oDmjUuIlbSmknJl4lBOfnDOYiw7ZxNsYONPCAT.bO/8aGWWZya', 'cronaca,economia,politica,moda,salute', '2024-01-02 13:46:17'),
(24, 'Davide', 'Mento', 'dmento@gmail.com', '$2y$10$6MsTCSIoIjc/ivV.ZwSRFejKoBw9HWa.EEyNX5yfwdzaskZbqlp2C', 'sport,motori,moda,informatica', '2024-01-07 13:52:36');

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
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT per la tabella `giornalisti`
--
ALTER TABLE `giornalisti`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la tabella `lettori`
--
ALTER TABLE `lettori`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
