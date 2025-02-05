from abc import ABC, abstractmethod


class Observer(ABC):
    @abstractmethod
    def update(self):
        pass


class Subject(ABC):
    @abstractmethod
    def register_observer(self, o: Observer):
        pass


class DisplayElement(ABC):
    @abstractmethod
    def display(self):
        pass


"""
WeatherData class
"""


class WeatherData(Subject):
    __temperature: float
    __humidity: float
    __pressure: float
    __observers: list = []

    def register_observer(self, o: Observer):
        self.__observers.append(o)

    def remove_observer(self, o: Observer):
        self.__observers.remove(o)

    def notify_observers(self):
        for observer in self.__observers:
            observer.update()

    def measurements_changed(self):
        self.notify_observers()

    def set_measurements(
            self,
            temperature: float,
            humidity: float,
            pressure: float
    ):
        self.__temperature = temperature
        self.__humidity = humidity
        self.__pressure = pressure
        self.measurements_changed()

    def get_temperature(self) -> float:
        return self.__temperature

    def get_humidity(self) -> float:
        return self.__humidity

    def get_pressure(self) -> float:
        return self.__pressure


class CurrentConditionsDisplay(Observer, DisplayElement):
    __temperature: float
    __humidity: float
    __weatherdata: WeatherData

    def __init__(self, weatherdata: WeatherData):
        self.__weatherdata = weatherdata
        self.__weatherdata.register_observer(self)

    def update(self):
        self.__temperature = self.__weatherdata.get_temperature()
        self.__humidity = self.__weatherdata.get_humidity()
        self.display()

    def display(self):
        print(f"""
Current Conditions:
Temperature: {self.__temperature}F degrees
Humidity: {self.__humidity}% humidity
            """)


class StatisticsDisplay(Observer, DisplayElement):
    __temperature: float
    __humidity: float
    __pressure: float
    __weatherdata: WeatherData

    def __init__(self, weatherdata: WeatherData):
        self.__weatherdata = weatherdata
        self.__weatherdata.register_observer(self)

    def update(self):
        self.__temperature = self.__weatherdata.get_temperature()
        self.__humidity = self.__weatherdata.get_humidity()
        self.__pressure = self.__weatherdata.get_pressure()
        self.display()

    def display(self):
        print(f"""{self.__temperature}°F/{self.__humidity}%☀/{self.__pressure}P""")


if __name__ == "__main__":
    print("========")
    weather_data = WeatherData()
    current_conditions_display = CurrentConditionsDisplay(weather_data)
    statistics_display = StatisticsDisplay(weather_data)
    weather_data.set_measurements(80, 65, 30)
    print("========")
    weather_data.set_measurements(67, 79, 50)
    print("========")
