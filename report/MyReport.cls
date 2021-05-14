%\NeedsTexFormat{LaTeX2e}
\ProvidesClass{MyReport}[2020/12/01 Report For USPN Project Template, v1.0]

\LoadClassWithOptions{report}

% -- Options supplémentaires
\DeclareOption{}{}


\ProcessOptions

% -------------------------------------------------------------
%           PACKAGES
% -------------------------------------------------------------
\RequirePackage[utf8]{inputenc}
\RequirePackage[T1]{fontenc}
\RequirePackage{lmodern}
\RequirePackage[french]{babel}
\RequirePackage{graphicx}
\RequirePackage[top=3cm, bottom=3cm, left=2.5cm, right=2.5cm]{geometry}
\RequirePackage{color}
\RequirePackage[dvipsnames]{xcolor}
\RequirePackage{enumitem}
\RequirePackage{helvet} % utilisation de helvet à défaut de arial

\RequirePackage{fancyhdr} % pour le style de page

\RequirePackage{appendix} % pour avoir des annexes


\RequirePackage{multicol}
% ---------------------------------------------------------------
%       COULEURS
% ---------------------------------------------------------------
\definecolor{darkBlue}{RGB}{36 , 42 , 117 }
\definecolor{lightBlue}{RGB}{93. ,191. ,212. }
\definecolor{lightGrey}{RGB}{228,228,232}
\definecolor{darkGrey}{RGB}{81,85,105}
\definecolor{darkWhite}{rgb}{0.94, 0.94, 0.94}



\renewcommand{\familydefault}{\sfdefault}



\RequirePackage{eurosym} % pour le symbole euro

% ---------------------------------------------------------------
% AFFICHAGE DU CODE SOURCE
% ---------------------------------------------------------------
\RequirePackage{listings}

\newcommand{\definePrintSourceCodeStyle}{
    \lstset{
      aboveskip=3mm,
      belowskip=-2mm,
      backgroundcolor=\color{darkWhite},
      basicstyle=\footnotesize,
      breakatwhitespace=false,
      breaklines=true,
      captionpos=b,
      commentstyle=\color{red},
      deletekeywords={...},
      escapeinside={\%*}{*)},
      extendedchars=true,
      framexleftmargin=16pt,
      framextopmargin=3pt,
      framexbottommargin=6pt,
      frame=tb,
      keepspaces=true,
      keywordstyle=\color{blue},
      language=C,
      literate=
      {²}{{\textsuperscript{2}}}1
      {⁴}{{\textsuperscript{4}}}1
      {⁶}{{\textsuperscript{6}}}1
      {⁸}{{\textsuperscript{8}}}1
      {€}{{\euro{}}}1
      {é}{{\'e}}1
      {è}{{\`{e}}}1
      {ê}{{\^{e}}}1
      {ë}{{\¨{e}}}1
      {É}{{\'{E}}}1
      {Ê}{{\^{E}}}1
      {û}{{\^{u}}}1
      {ù}{{\`{u}}}1
      {â}{{\^{a}}}1
      {à}{{\`{a}}}1
      {á}{{\'{a}}}1
      {ã}{{\~{a}}}1
      {Á}{{\'{A}}}1
      {Â}{{\^{A}}}1
      {Ã}{{\~{A}}}1
      {ç}{{\c{c}}}1
      {Ç}{{\c{C}}}1
      {õ}{{\~{o}}}1
      {ó}{{\'{o}}}1
      {ô}{{\^{o}}}1
      {Õ}{{\~{O}}}1
      {Ó}{{\'{O}}}1
      {Ô}{{\^{O}}}1
      {î}{{\^{i}}}1
      {Î}{{\^{I}}}1
      {í}{{\'{i}}}1
      {Í}{{\~{Í}}}1,
      morekeywords={*,...},
      numbers=left,
      numbersep=10pt,
      numberstyle=\tiny\color{black},
      rulecolor=\color{black},
      showspaces=false,
      showstringspaces=false,
      showtabs=false,
      stepnumber=1,
      stringstyle=\color{gray},
      tabsize=4,
      title=\lstname,
    }
}


% ----------------------------------------------------------------
%       EN-TETE ET PIED DE PAGE
% ----------------------------------------------------------------
\pagestyle{plain}


% ----------------------------------------------------------------
%       ECRIRE THMS, DEFINITIONS, ...
% ----------------------------------------------------------------
\RequirePackage{amsmath, amsfonts,amssymb,amsthm}
\RequirePackage{stmaryrd} % crochet double barre


\theoremstyle{definition}
\newtheorem{defn}{Définition}[chapter]
\newtheorem{prop}{Proposition}[chapter]
\newtheorem{thm}{Théorème}[chapter]
\newtheorem{coro}{Corollaire}[chapter]
\newtheorem{rmq}{Remarque}[chapter]

\theoremstyle{remark}
\newtheorem{exemple}{Exemple}[chapter]

\newcommand{\ceil}[1]{\lceil #1 \rceil}
% ----------------------------------------------------------------
%       COMMANDES POUR CHAPITRES ET SECTIONS
% ----------------------------------------------------------------

% Les liens
\RequirePackage{hyperref}
\hypersetup{
  colorlinks=true,
  linkcolor=darkBlue,
  urlcolor=lightBlue
}



\RequirePackage{tocbibind} 
\setcounter{secnumdepth}{4}


% AJOUT DES CHAPITRES NON NUMEROTES DANS LA TABLE DES MATIERES
\RequirePackage{titletoc}
\setcounter{tocdepth}{3}


% MODIFICATION DES STYLES DE CHAPITRES, SECTIONS, SOUS-SECTIONS
\RequirePackage{titlesec}


\newcommand{\addchaptertable}[1]{\addcontentsline{toc}{chapter}{#1}}
\newcommand{\addsectiontable}[1]{\addcontentsline{toc}{section}{#1}}

%\titleformat{\chapter}[display]{\huge \scshape \bfseries }{Chapitre \thechapter:}{0.7\baselineskip}{}[\hrule]

\titleformat{\chapter}[block]{\huge \scshape \bfseries }{\thechapter.}{0.7\baselineskip}{}[\hrule]

\titleformat{\section}[block]{\large \bfseries \color{darkBlue}}{\thesection }{0.7\baselineskip}{}[]


\titleformat{\subsection}[block]{\bfseries \color{darkGrey}}{\quad \thesubsection }{0.7\baselineskip}{}[]

% MODIFICATION DU STYLE ITEMIZE
\setitemize[1]{label=\textbullet, font=\large \color{darkBlue}}
\setitemize[2]{label=\textbullet, font=\large \color{lightBlue}}


% ----------------------------------------------------------------
%       PAGE DE GARDE
% ----------------------------------------------------------------
\RequirePackage{titling} % pour utiliser \thetitle, \theauthor, ... 

\newcommand{\HRule}{\rule{\linewidth}{0.5mm}}

% commande printTitle{sous-titre du document}
\newenvironment{printTitle}{
    \begin{titlepage}
        
        % logos à placer 
        \begin{center}
            \vspace*{-2cm}
             \begin{minipage}[l]{0.45\linewidth}
                \hspace*{-1cm}
                \includegraphics[width=5cm]{img/logo_institut_galilee.png}
            \end{minipage}
            \begin{minipage}[r]{0.45\linewidth}
                \hspace*{1cm}
                \includegraphics[width=5cm]{img/logoUSPN-site.png}
            \end{minipage}
        \end{center}
        
        % titre centré
        \vfill
        \begin{center}
            {\bfseries \theauthor}
            \vspace*{0.5cm}
            \hrule
            \vspace*{0.6cm}
            {\scshape \bfseries \huge \thetitle}
            \vspace*{0.6cm}
            \hrule     
        \end{center}
        \vfill
}{      
        \vfill
        \begin{center}
            \thedate
        \end{center}
    \end{titlepage}
    \newpage
}

% ----------------------------------------------------------------
%       STYLE ABSTRACT
% ----------------------------------------------------------------
\renewenvironment{abstract}{
    \begin{center}
        {\huge \bfseries \thetitle} \\
        \vspace*{0.5cm}
        {\Large \theauthor} \\ 
        
    \end{center}
    \vspace*{2cm}
}{\newpage}

% ----------------------------------------------------------------
%       STYLE REMERCIEMENTS
% ----------------------------------------------------------------
\newenvironment{remerciements}{
    \vfill
    \chapter*{Remerciements}
    \vspace*{1.5cm}
}{
    \vfill
    \newpage
}
% ----------------------------------------------------------------
%       DESSINS ET SCHEMAS
% ----------------------------------------------------------------
\RequirePackage{pict2e}
\RequirePackage{epic}
\RequirePackage{wrapfig}
\RequirePackage{subcaption}

\setlength{\unitlength}{1mm}
\newcommand{\schemalabel}[3]{
    \put(#1, #2){\shortstack[l]{\scriptsize #3}}
}
\newcommand{\schemapoint}[3]{
    % #1 couleur, #2 abscisse, #3 ordonnée
    \textcolor{#1}{
                {\huge\bfseries \put(#2,#3){\shortstack[l]{.}}}
    }
}

\newcommand{\boitecouleur}[2]{
	\colorbox{#1}{
		\vspace*{0.2cm}\\
		\shortstack[cc]{#2}
		\vspace*{0.2cm}
	}
}

\RequirePackage{wrapfig}
% ----------------------------------------------------------------
%       COMMANDES SUPPLEMENTAIRES
% ----------------------------------------------------------------
\newcommand{\todo}[1]{\textcolor{red}{\bfseries \underline{TODO:} #1}}

% --- Présenter des algorithmes
%\RequirePackage{algorithm}
\RequirePackage[ruled, vlined,french]{algorithm2e}
%\RequirePackage{algorithmic}

\newcommand{\state}{\STATE $\blacksquare$ \;}

% --- Cadres importants
\RequirePackage{fancybox}
\newcommand{\boiteinfo}[2]{%
    \begin{center}
        { \color{Fuchsia}
        \boxput*(0,1){%
            \colorbox{white}{\bfseries \itshape #1}}{%
                \setlength{\fboxsep}{6pt}\fbox{%
                    \begin{minipage}{0.8\linewidth}
                    \medskip
                    {\itshape #2}
                    \medskip
                    \end{minipage}
            }
        }
        }
    \end{center}
}

% --------------------------------------------------------------
%       ECRITURE DES MATHEMATIQUES
% --------------------------------------------------------------
\newcommand{\vecteur}[1]{\overrightarrow{#1}}
\newcommand{\R}{\mathbb{R}}