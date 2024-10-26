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

    remote.set_command(light_on)
    remote.button_was_pressed()
