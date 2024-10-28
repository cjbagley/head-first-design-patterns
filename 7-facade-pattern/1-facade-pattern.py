from clients import *


class HomeTheaterFacade:
    def __init__(self,
                 amp: Amplifier,
                 tuner: Tuner,
                 player: Player,
                 lights: TheaterLights,
                 screen: Screen,
                 popcorn_popper: PopcornPopper
                 ):
        self.amp = amp
        self.tuner = tuner
        self.player = player
        self.lights = lights
        self.screen = screen
        self.popcorn_popper = popcorn_popper

    def watch_movie(self):
        print('Getting ready to watch a movie....')
        self.popcorn_popper.on()
        self.popcorn_popper.pop()
        self.lights.dim(10)
        self.screen.on()
        self.amp.on()
        self.amp.set_volume(5)
        self.player.on()

    def end_movie(self):
        print('Shutting movie theater down....')
        self.popcorn_popper.off()
        self.lights.on()
        self.screen.off()
        self.amp.off()
        self.player.off()


if __name__ == "__main__":
    hifi_tuner = Tuner()
    streaming_player = Player()
    main_amp = Amplifier(hifi_tuner, streaming_player)

    home_theater = HomeTheaterFacade(main_amp, hifi_tuner, streaming_player, TheaterLights(), Screen(), PopcornPopper())

    home_theater.watch_movie()
    print("----watching movie----")
    home_theater.end_movie()

"""
Getting ready to watch a movie....
Popcorn Popper on
Popcorn Popper pop
Theater Lights dim set to 10
Screen on
Amplifier on
Amplifier volume set to 5
Player on
----watching movie----
Shutting movie theater down....
Popcorn Popper off
Theater Lights on
Screen off
Amplifier off
Player off
"""
