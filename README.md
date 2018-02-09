# p2-projekt #

## Start her: ##

  "Git" er det man kalder et versioneringssystem. Ideen bag det er at man "gemmer" versioner af filer, således at man nemt kan vende tilbage til en tidligere version, så man sikre at der ikke sker fejl, og så man kan håndtere dette.


## GitHub Setup Guide ##
  1. Lav en bruger på [GitHub](https://github.com/join?source=header-home)

    1. På [GitHub Education](https://education.github.com/) kan man få en masse lækre sager, hvis man tilknytter noget bevis for at man er studerende. Det kan varmt anbefales.    

  2. Herefter skal vi have installeret Git på din PC:

  ### :poop: Windows-installation :poop: ###

  ___JEG IKKE HAR KUNNE TESTE DET HER SELV, DA JEG IKKE EJER EN WINDOWS COMPUTER___

    1. Download ["Git for windows"](https://git-for-windows.github.io/) og gennemfør installationen
      - Du får i løbet af installationen muligheden for at kunne kører Git gennem en "Command Prompt" eller det der hedder "Git Bash", vælg eventuelt "Git Bash", jeg har kunne læse mig til den fungere forholdsvis godt.

    2. Åben nu enten "Git Bash" eller "Command Prompt", og kør følgende kommandoer for at sætte dine brugeroplysninger op:

      ```bash
        $ git config --global user.name "Emma Paris"
        $ git config --global user.email "eparis@atlassian.com"
      ```

  _Du kan nu bruge Git på din Windows computer._

  ### :raised_hands: MacOS-installation :raised_hands: ###

  Ah ja, du har en ordentligt computer, baseret på UNIX, fuck hvor :bomb:'en.

    0. Åben først "Terminal" og kør følgende kommando:

      ```bash
      $ git --version
      ```

      Giver denne et ouput, er alt godt, og Git er installeret, du kan fortsætte til 2.

    1. Download ["Git installer"](https://sourceforge.net/projects/git-osx-installer/files/) og gennemfør installations forløbet.

    2. Åben nu "Terminal", og kør følgende kommandoer for at sætte dine brugeroplysninger op:

      ```bash
        $ git config --global user.name "Emma Paris"
        $ git config --global user.email "eparis@atlassian.com"
      ```
  _Du kan nu bruge Git på din MacOS computer._
