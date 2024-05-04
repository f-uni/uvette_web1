SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+02:00";

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `domanda`
--

CREATE TABLE `domanda` (
  `quiz` int NOT NULL,
  `numero` int NOT NULL,
  `testo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `partecipazione`
--

CREATE TABLE `partecipazione` (
  `codice` int NOT NULL,
  `utente` varchar(25) NOT NULL,
  `quiz` int NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `quiz`
--

CREATE TABLE `quiz` (
  `codice` int NOT NULL,
  `creatore` varchar(25) NOT NULL,
  `titolo` varchar(100) NOT NULL,
  `data_inizio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_fine` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `risposta`
--

CREATE TABLE `risposta` (
  `quiz` int NOT NULL,
  `domanda` int NOT NULL,
  `numero` int NOT NULL,
  `testo` varchar(1000) NOT NULL,
  `tipo` enum('corretta','sbagliata') NOT NULL,
  `punteggio` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `risposta_utente_quiz`
--

CREATE TABLE `risposta_utente_quiz` (
  `partecipazione` int NOT NULL,
  `quiz` int NOT NULL,
  `domanda` int NOT NULL,
  `risposta` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `nome_utente` varchar(25) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `cognome` varchar(25) NOT NULL,
  `email` varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `domanda`
--
ALTER TABLE `domanda`
  ADD PRIMARY KEY (`quiz`,`numero`);

--
-- Indici per le tabelle `partecipazione`
--
ALTER TABLE `partecipazione`
  ADD PRIMARY KEY (`codice`);

--
-- Indici per le tabelle `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`codice`);

--
-- Indici per le tabelle `risposta`
--
ALTER TABLE `risposta`
  ADD PRIMARY KEY (`quiz`,`domanda`,`numero`);

--
-- Indici per le tabelle `risposta_utente_quiz`
--
ALTER TABLE `risposta_utente_quiz`
  ADD PRIMARY KEY (`partecipazione`,`quiz`,`domanda`,`risposta`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`nome_utente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `partecipazione`
--
ALTER TABLE `partecipazione`
  MODIFY `codice` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `quiz`
--
ALTER TABLE `quiz`
  MODIFY `codice` int NOT NULL AUTO_INCREMENT;
COMMIT;
