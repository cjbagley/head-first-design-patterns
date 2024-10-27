class Light:
    @staticmethod
    def on():
        print('Turn light on')

    @staticmethod
    def off():
        print('Turn light off')


class GarageDoor:
    @staticmethod
    def up():
        print('Raise garage door')

    @staticmethod
    def down():
        print('Lower garage door')

    @staticmethod
    def stop():
        print('Stop garage door from moving')

    @staticmethod
    def light_on():
        print('Turn garage door light on')

    @staticmethod
    def light_off():
        print('Turn garage door light off')


class Stereo:
    @staticmethod
    def on():
        print('Turn stereo on')

    @staticmethod
    def off():
        print('Turn stereo off')

    @staticmethod
    def set_cd():
        print('Set stereo to play a CD')

    @staticmethod
    def set_dvd():
        print('Set stereo to play a DVD')

    @staticmethod
    def set_radio():
        print('Set stereo to play the radio')

    @staticmethod
    def set_volume(volume: int):
        print(f'Set stereo volume level to {volume}')


class CeilingFan:
    @staticmethod
    def on():
        print('Turn ceiling fan on')

    @staticmethod
    def off():
        print('Turn ceiling fan off')
