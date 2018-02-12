## Git Comands ##

Git kan utroligt meget, så meget som er vildt brugbart og en helt masse som har meget specifikke brugssituationer. Men generelt findes der 4 kommandoer der er relevante og vigtige for den generelle brug af Git.


### Filhåndtering ###

De første 3 kommandoer repræsentere flowet omkring filer. Her tilføjes filer til Git, og uploades til Github - men det er lidt mere besværligt end som så.  

1.  Alle filer, mapper og lignende skal tilføjes til det der kaldes "The staging area", som kunne beskrives som at gøre det gældende materiale syneligt for Git.


```Shell
$ git add <FILNAVN/MAPPENAVN/FLAG/MM.>
```

2. Herefter skal du som udvikler forpligte sig til sine ændringer. Kommandoe hedder på engelsk "Commit", men grunden til at jeg kalder det en forpligtelse, er fordi det er det der er hensigten med kommandoen. Man kan samtidig også tænke "Commit" som noget man "Begår". Lige meget hvordan man tolker det, betyder det at man har ændret et eller andet i indholdet af git-repoet. Derfor skal man altid beskrive hvad man har ændret, i en "Commit message" til sin ændring.

```Shell
$ git commit

#Hvis man bare skriver den første kommando, så åbner terminalen en besked med "Vim", det er en hel tutorial for sig selv, så overvej at tilføje dette "Flag":

$ git commit -m "Hej, det her er min første ændring i kodebasen"
```

3. Herefter skal man som udvikler tilføje de ændringer man har lavet til Git-repoet. Dette gør man ved at skubbe det op i skyen.

```Shell
$ git push
```

### Branching ###
