from abc import ABC, abstractmethod
from vendors import *


class Command(ABC):
    @abstractmethod
    def execute(self):
        pass


"""
No Command
Used as a blank place holder
Example of a 'Nul Object' that is often used in design patterns
"""


class NoCommand(Command):
    def execute(self):
        pass


"""
Light Commands
"""


class LightOnCommand(Command):
    def __init__(self, light: Light):
        self.light = light

    def execute(self):
        self.light.on()


class LightOffCommand(Command):
    def __init__(self, light: Light):
        self.light = light

    def execute(self):
        self.light.off()


"""
Garage Commands
"""


class GarageDoorOpenCommand(Command):
    def __init__(self, garage_door: GarageDoor):
        self.garage_door = garage_door

    def execute(self):
        self.garage_door.up()


class GarageDoorCloseCommand(Command):
    def __init__(self, garage_door: GarageDoor):
        self.garage_door = garage_door

    def execute(self):
        self.garage_door.down()


"""
Stereo Commands
"""


class StereoOffCommand(Command):
    def __init__(self, stereo: Stereo):
        self.stereo = stereo

    def execute(self):
        self.stereo.off()


class StereoOnWithCDCommand(Command):
    def __init__(self, stereo: Stereo):
        self.stereo = stereo

    def execute(self):
        self.stereo.on()
        self.stereo.set_cd()
        self.stereo.set_volume(11)


class StereoOnWithDVDCommand(Command):
    def __init__(self, stereo: Stereo):
        self.stereo = stereo

    def execute(self):
        self.stereo.on()
        self.stereo.set_dvd()
        self.stereo.set_volume(11)


class StereoOnWithRadioCommand(Command):
    def __init__(self, stereo: Stereo):
        self.stereo = stereo

    def execute(self):
        self.stereo.on()
        self.stereo.set_radio()
        self.stereo.set_volume(11)


"""
Ceiling Fan Commands
"""


class CeilingFanOnCommand(Command):
    def __init__(self, ceiling_fan: CeilingFan):
        self.ceiling_fan = ceiling_fan

    def execute(self):
        self.ceiling_fan.on()


class CeilingFanOffCommand(Command):
    def __init__(self, ceiling_fan: CeilingFan):
        self.ceiling_fan = ceiling_fan

    def execute(self):
        self.ceiling_fan.off()
