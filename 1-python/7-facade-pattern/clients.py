class Tuner:
    @staticmethod
    def on():
        print('Tuner on')

    @staticmethod
    def off():
        print('Tuner off')

    @staticmethod
    def set_am():
        print('Tuner set to AM')

    @staticmethod
    def set_fm():
        print('Tuner set to FM')

    @staticmethod
    def set_frequency():
        print('Tuner frequency set')


class Player:
    @staticmethod
    def on():
        print('Player on')

    @staticmethod
    def off():
        print('Player off')

    @staticmethod
    def pause():
        print('Player paused')

    @staticmethod
    def play():
        print('Player play')


class Amplifier:
    def __init__(self, tuner: Tuner, player: Player):
        self.tuner = tuner
        self.player = player

    @staticmethod
    def on():
        print('Amplifier on')

    @staticmethod
    def off():
        print('Amplifier off')

    @staticmethod
    def set_volume(volume: int):
        print(f'Amplifier volume set to {volume}')


class PopcornPopper:
    @staticmethod
    def on():
        print('Popcorn Popper on')

    @staticmethod
    def off():
        print('Popcorn Popper off')

    @staticmethod
    def pop():
        print('Popcorn Popper pop')


class TheaterLights:
    @staticmethod
    def on():
        print('Theater Lights on')

    @staticmethod
    def off():
        print('Theater Lights off')

    @staticmethod
    def dim(setting: int):
        print(f'Theater Lights dim set to {setting}')


class Screen:
    @staticmethod
    def on():
        print('Screen on')

    @staticmethod
    def off():
        print('Screen off')
