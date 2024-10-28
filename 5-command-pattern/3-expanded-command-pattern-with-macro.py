from commands import *
from macro import MacroCommand


class RemoteControl:
    on_commands: list[Command]
    off_commands: list[Command]

    def __init__(self):
        self.on_commands = []
        self.off_commands = []
        for x in range(7):
            self.on_commands.append(NoCommand())
            self.off_commands.append(NoCommand())

    def set_command(self, slot: int, on_command: Command, off_command: Command):
        if slot < 0 or slot > 6:
            raise ValueError("Please pick a slot between 0 and 6")
        self.on_commands[slot] = on_command
        self.off_commands[slot] = off_command

    def on_button_pressed(self, slot: int):
        self.on_commands[slot].execute()

    def off_button_pressed(self, slot: int):
        self.off_commands[slot].execute()

    def __str__(self):
        string = f"""
==============
Remote Control
==============
On Commands:
"""
        for i, command in enumerate(self.on_commands):
            string += f"""slot[{i}] = {command.__class__.__name__}\n"""

        string += "\nOff Commands:\n"

        for i, command in enumerate(self.off_commands):
            string += f"""slot[{i}] = {command.__class__.__name__}\n"""

        return string


if __name__ == "__main__":
    remote = RemoteControl()

    light = Light()
    light_on = LightOnCommand(light)
    light_off = LightOffCommand(light)

    garage_door = GarageDoor()
    garage_door_up = GarageDoorOpenCommand(garage_door)
    garage_door_down = GarageDoorCloseCommand(garage_door)

    stereo = Stereo()
    stereo_with_cd = StereoOnWithCDCommand(stereo)
    stereo_with_dvd = StereoOnWithDVDCommand(stereo)
    stereo_with_radio = StereoOnWithRadioCommand(stereo)
    stereo_off = StereoOffCommand(stereo)

    ceiling_fan = CeilingFan()
    ceiling_fan_on = CeilingFanOnCommand(ceiling_fan)
    ceiling_fan_off = CeilingFanOffCommand(ceiling_fan)

    party_on = [light_on, stereo_with_cd, ceiling_fan_on]
    party_off = [light_off, stereo_off, ceiling_fan_off]
    party_on_macro = MacroCommand(party_on)
    party_off_macro = MacroCommand(party_off)
    remote.set_command(0, party_on_macro, party_off_macro)

    print("-----Starting Party-----")
    remote.on_button_pressed(0)
    print("-----Stopping Party-----")
    remote.off_button_pressed(0)

    """
    Having the macro now allows several commands to run
    at the press of one button.
    Output:
    -----Starting Party-----
    Turn light on
    Turn stereo on
    Set stereo to play a CD
    Set stereo volume level to 11
    Turn ceiling fan on
    -----Stopping Party-----
    Turn light off
    Turn stereo off
    Turn ceiling fan off 
    """
