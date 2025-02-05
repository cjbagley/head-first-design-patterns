from commands import *


class SimpleRemoteControl:
    slot: Command

    def set_command(self, command: Command):
        self.slot = command

    def button_was_pressed(self):
        self.slot.execute()


if __name__ == "__main__":
    remote = SimpleRemoteControl()

    light = Light()
    light_on = LightOnCommand(light)

    garage_door = GarageDoor()
    garage_door_up = GarageDoorOpenCommand(garage_door)

    remote.set_command(light_on)
    remote.button_was_pressed()
    remote.set_command(garage_door_up)
    remote.button_was_pressed()
