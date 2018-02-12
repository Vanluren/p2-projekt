## Start her: ##

### PHP ###

Til at arbejde med PHP er der en række programmer der med fordel kan bruges. Et af dem er "PHPStorm" fra JetBrains. PHPStorm er det man kalder et "Intelligent Developement Enviornment"(IDE). Et IDE gør det væsentligt nemmere at skrive kode, fordi det er bygget til at give dig code hints og intelligente forslag til din kode. Det kan hentes gratis ved [JetBrains Students](https://www.jetbrains.com/student/)

### :octocat: Git :octocat: ###

"Git" er det man kalder et versioneringssystem. Ideen bag det er at man "gemmer" versioner af filer, således at man nemt kan vende tilbage til en tidligere version, så man sikre at der ikke sker fejl, og så man kan håndtere nemt dette.

"Github" er et system der er bygget til at konsolidere organisationers brug af Git, og formidle dette til dets brugere. Github er bare et af mange systemer der gør dette.

Git kan bruges fra "Command Prompt" i windows, fra "Terminal" i MacOS og det kan repræsenteres visuelt via dedikerede programmer som f.eks. "Sourcetree".

## :octocat: GitHub Setup Guide :octocat: ##

1. Lav en bruger på [GitHub](https://github.com/join?source=header-home)
    1. På [GitHub Education](https://education.github.com/) kan man få en masse lækre sager, hvis man tilknytter noget bevis for at man er studerende. Det kan varmt anbefales.

2. Herefter skal vi have installeret Git på din PC:

  ### :poop: Windows-installation :poop: ###

  ___JEG IKKE HAR KUNNE TESTE DET HER SELV, DA JEG IKKE EJER EN WINDOWS COMPUTER___
1. Download ["Git for windows"](https://git-for-windows.github.io/) og gennemfør installationen
    1. Du får i løbet af installationen muligheden for at kunne kører Git gennem en "Command Prompt" eller det der hedder "Git Bash", vælg eventuelt "Git Bash", jeg har kunne læse mig til den fungere forholdsvis godt.
2. Åben nu enten "Git Bash" eller "Command Prompt", og kør følgende kommandoer for at sætte dine brugeroplysninger op:

```Shell

$ git config --global user.name "Emma Paris"`
$ git config --global user.email "eparis@atlassian.com"

```

_Du kan nu bruge Git på din Windows computer._

### :raised_hands: MacOS-installation :raised_hands: ###

Fedt, du har en ordentligt computer baseret på UNIX, fuck hvor :bomb:en.

0. Åben først "Terminal" og kør følgende kommando:

```Shell

$ git --version

```
_Giver denne et ouput, er alt godt, og Git er installeret, du kan fortsætte til 2._

1. Download [Git installationen](https://sourceforge.net/projects/git-osx-installer/files/) og gennemfør installations forløbet.

```Shell

$ git config --global user.name "Emma Paris"
$ git config --global user.email "eparis@atlassian.com"

```
2. Åben nu "Terminal", og kør følgende kommandoer for at sætte dine brugeroplysninger op:

```Shell

$ git config --global user.name "Emma Paris"
$ git config --global user.email "eparis@atlassian.com"

```

_Du kan nu bruge Git på din MacOS computer._

## Sourcetree Setup ##

1. Download installeren fra [Sourcetrees hjemmeside](https://www.sourcetreeapp.com/) og gennemfør denne

## Næste trin: ##

I din terminal skal du nu udfører følgende kommando:

```Shell
$ git checkout git-commands
```
