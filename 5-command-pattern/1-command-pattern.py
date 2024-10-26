from abc import ABC, abstractmethod


class Command(ABC):
    @abstractmethod
    def execute(self):
        pass


class Light:
    @staticmethod
    def on():
        print('Turn light on')

    @staticmethod
    def off():
        print('Turn light off')


class LightOnCommand(Command):
    def __init__(self, light: Light):
        self.light = light

    def execute(self):
        self.light.on()


class GarageDoor:
    @staticmethod
    def up():
        print('Raise garage door')

    def down():
        print('Lower garage door')

    def stop():
        print('Stop garage door from moving')

    def light_on():
        print('Turn garage door light on')

    def light_off():
        print('Turn garage door light off')


class GarageDoorOpenCommand(Command):
    def __init__(self, garage_door: GarageDoor):
        self.garage_door = garage_door

    def execute(self):
        self.garage_door.up()


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
