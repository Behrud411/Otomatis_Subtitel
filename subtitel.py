import speech_recognition as sr
import pydub
import srt
import datetime as dt
import os

os.system('clear')
print ("""
\033[1;36m^   ▒▀▀█▀▀  ▒█  ▒█  ▒▀▀█▀▀█  ▒█▀▀█  ▒▀█▀▒     \033[1;36m^
\033[1;36m^     ▒█    ▒█  ▒█    ▒█  █  ▒█  █    █       ^
\033[1;36m^   \033[1;37m  ▒█    ▒█  ▒█    ▒█▄▄█  ▒█▄▄█    █       \033[1;36m^
\033[1;36m^   \033[1;37m  ▒█    ▒█▄▄▒█    ▒█     ▒█ ▒█  ▒▄█▄▒     \033[1;36m^
\033[1;34m▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄
\033[1;34m█\033[1;36mPEMBUAT  : \033[1;37mTupai\033[1;34m       █\033[1;36mYT: \033[1;37mPenghasil Gratisan\033[1;34m █
\033[1;34m█\033[1;36mHOBI     : \033[1;37mNyopet\033[1;34m      █\033[0;33m       Warning!!!      \033[1;34m█
\033[1;34m█\033[1;36mAQOUNT_ML: \033[1;37mAllmost.kill\033[1;34m█\033[0;33m  This script is free\033[1;34m  █
\033[1;34m█▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄█▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄█
\033[1;34m█▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄█▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄█""")



file = input("\033[0;32mMASUKKAN NAMA AUDIO: \033[0;33m") 

cpt = int(input("\033[0;32mKecepatan bicara: \033[0;33m"))
bsr = int(input("\033[0;32mPelan Keras Nya Suara: \033[0;33m"))


myaudio = pydub.AudioSegment.from_wav(file)
bicara = pydub.silence.detect_nonsilent(myaudio, min_silence_len=cpt, silence_thresh=bsr)
bicara = [(int(start/1000),int(stop/1000)) for start,stop in bicara] #convert to sec

print ("\033[1;33mSYSTEM SEDANG MENDETEKSI WAKTU BICARA")
print(bicara)

bhs = input("\033[0;32mMASUKKAN BAHASA AUDIO: \033[0;33m") 

engine = sr.Recognizer()
subs = []
timer = 0

with sr.AudioFile(file) as source:
  for i,v in enumerate(bicara):
      audiotext = engine.record(source, duration=v[1]-timer)

      try:
          kata = engine.recognize_google(audiotext, language = bhs)
          subs.append(srt.Subtitle(index=(i+1), start=dt.timedelta(seconds=v[0]), end=dt.timedelta(seconds=v[1]), content=kata))
          timer += (v[1]-timer)
          print(v[1])
      except sr.UnknownValueError:
          print ("\033[1;33mSYSTEM BUDEK CUK SUARA GK KEDENGERAN")
      except Exception as e:
          print(e)
          
file = open("Sub.srt", "w")
file.write(srt.compose(subs))
file.close()



